<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\BorrowRepositoryEloquent;
use App\Repositories\Eloquent\ReaderRepositoryEloquent;
use App\Repositories\Eloquent\BookRepositoryEloquent;

class BorrowService extends BaseService
{
    protected $route='borrow.index';
    protected $borrow;
    protected $reader;
    protected $book;

    public function __construct(BorrowRepositoryEloquent $borrow, ReaderRepositoryEloquent $reader, BookRepositoryEloquent $book)
    {
        $this->borrow=$borrow;
        $this->reader=$reader;
        $this->book=$book;
    }

    //取出讀者
    public function getReader(Request $request)
    {
        $data=null;
        if ($request->has('reader_barcode')) {
            if (!empty($request->reader_barcode)) {
                $reader=$this->reader->findReader($request->reader_barcode);
                $borrows=$this->borrow->findReaderID($reader[0]->id);

                foreach ($borrows as $borrow) {
                    if ($borrow->returned=="2") {
                        $data[]=[
                        'name'=>$borrow->book->name,
                        'author'=>$borrow->book->author,
                        'borrow'=>$borrow->borrow,
                        'return'=>$borrow->return,
                        'id'=>$borrow->id
                        ];
                    }
                }
            }
        }
        
        if (count($reader)>0) {
            return response()->json([
                "info"=>"success",
                "reader"=>$reader,
                "borrows"=>$data
            ]);
        }
        
        // return response()->json([
        //         "info"=>"error",
        // ]);
    }
    
    //取出圖書
    public function getBook(Request $request)
    {
        if ($request->has('book_barcode')) {
            if (!empty($request->book_barcode)) {
                $book=$this->book->findBarde($request->book_barcode);
            }
        }
        return response()->json($book);
    }

    //取出借的圖書
    public function getBookBorrow(Request $request)
    {
        if ($request->has('book_barcode')) {
            if (!empty($request->book_barcode)) {
                $book=$this->book->findBorrow($request->book_barcode);
                if (count($book[0]->borrow)>=1) {
                    return response()->json($book);
                }
            }
        }
        return response()->json(["error"=>"noborrow"]);
    }
    
    //借書
    public function borrow(Request $request)
    {
        //重複借閱
        $checkBorrow=$this->borrow->getBorrow($request->reader_id, $request->book_id);
        if (count($checkBorrow) >=1) {
            return response()->json([
                "error"=>"repeat",
            ]);
        }

        //可借閱天數
        $borrow_day=$this->book->find($request->book_id)->bookType->borrow_day;

        //借閱次數
        $BorrowCount=$this->borrow->getkBorrowCount($request->reader_id);
        if (count($BorrowCount) >= $request->borrow_book) {
            return response()->json([
                "error"=>"count",
            ]);
        }

        $data=[
            'reader_id'=>$request->reader_id,
            'book_id'=>$request->book_id,
            'borrow'=>date('Y-m-d'),
            'return'=>date("Y-m-d", (time()+3600*24*$borrow_day)),
        ];

        //借閱
        if ($this->borrow->create($data)) {
            return response()->json([
                "info"=>"success",
            ]);
        }

        return response()->json([
                "info"=>"error",
        ]);
    }

    public function back(Request $request)
    {
        $data=[
            'real_return'=>date('Y-m-d H:m:s'),
            'returned'=>'1'
        ];

        if ($this->borrow->updateReturn($data, $request->reader_id, $request->book_id)) {
            return response()->json(true);
        }
        return response()->json(false);
    }
}
