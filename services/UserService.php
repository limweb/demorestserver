<?php


//----------------------------------------------
//FILE NAME:  UserService.php gen for Servit Framework Service
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-12-17(Thu)  12:18:17 
//----------------------------------------------
use Illuminate\Database\Capsule\Manager as Capsule;
use \test\User;

class UserService 
{

    public static function all()
    {
        return User::get();
    }

    public static function alliddesc()
    {
        return User::orderBy('id', 'desc')->get();
    }

    public static function byId($id)
    {
        return User::find($id);
    }

    public static function insert()
    {
        $req = new \Request();
        $arrdata = $req->input->toArray();
        $r = new User();
        $fills = $r->getFillable();
        foreach ($fills as $key) {
            if (isset($arrdata[$key])) {
                $r->{$key} = $arrdata[$key];
            }
        }

       if($req->user) { 
           $userid = $req->user->id;
           $r->created_by = $userid;
           $r->updated_by = $userid;
       }

        $r->save();
        return $r;
    }

    public static function insertOrupdate()
    {
        $req = new \Request();
        $arrdata = $req->input->toArray();
        $r = null;
        $newdata = false; 
        if (isset($arrdata['id'])) {
            $r = User::find($arrdata['id']);
        }
        if (!$r) {
            $r = new User();
             $newdata = true; 
        }

        $fills = $r->getFillable();
        foreach ($fills as $key) {
            if (isset($arrdata[$key])) {
                $r->{$key} = $arrdata[$key];
            }
        }

        if($req->user) { 
            $userid = $req->user->id;
            if($newdata) { 
               $r->created_by = $userid;
            }
            $r->updated_by = $userid;
        }

        $r->save();
        return $r;
    }

    public static function delete($id)
    {
        $r = User::find($id);
        if ($r) {

             $req = new \Request();
             if($req->user) { 
                   $userid = $req->user->id; 
                   $r->deleteBy = $userid;
             }

            return $r->delete();
        } else {
            return 0;
        }
    }

    public static function vuetable()
    {
            //Capsule::enableQueryLog();
            $req = new \Request();
            $qry = User::query();
            $perpage = $req->gets->has('per_page') ? (int)$req->gets->per_page : 10 ;
            $current_page = $req->gets->has('page') ? (int)$req->gets->page : 1 ;
            $from = ( $current_page - 1 ) * $perpage ;
            $to= ($current_page)*$perpage;
            $host = $req->servers->HTTP_HOST;
            if($host){
                $protocal = explode('/',$req->servers->SERVER_PROTOCOL)[0]=='HTTP'?'http':'https';
                $urlnext = $protocal.'://'.$host.$req->servers->PATH_INFO;
                $urlprev = $protocal.'://'.$host.$req->servers->PATH_INFO;
                if($req->gets->has('sort')){
                    $urlnext .= '&sort='.$req->gets->sort;
                    $urlprev .= '&sort='.$req->gets->sort;
                }
                if($req->gets->has('filter')){
                    $urlnext .= '&filter='.$req->gets->filter;
                    $urlprev .= '&filter='.$req->gets->filter;
                }
            }
            if($req->gets->has('sort')){
                $sorts = explode(',',$req->gets->sort);
                foreach($sorts as $sort){
                    list($s,$ds) =  explode('|',$sort);
                    $qry->orderBy($s,$ds);
                }

            }
            if($req->gets->has('kw')){
                $fills = []; //['name','nickname'];
                foreach ($fills as $key) {
                    $qry->orWhere($key,'like','%'.$req->gets->kw.'%');
                }
                $urlnext .= '&kw='.$req->gets->kw;
                $urlprev .= '&kw='.$req->gets->kw;
            }
            if($req->gets->has('filter')){
                $filters = explode(',',$req->gets->filter);
                foreach($filters as $filter){
                    list($f,$kw) =  explode('|',$filter);
                    $qry->orWhere($f,'like','%'.$kw.'%');
                }
            }

            $total = $qry->count();
            $lastpage = ceil($total/$perpage);
            $datas = $qry->take($perpage)->skip($from)->get();

            if($current_page == $lastpage || $total==0 || $lastpage == 0 ){
                $next_page_url= null;
            } else {
                $next_page_url= $urlnext.'&page='.($current_page+1).'&perpage='.$perpage;
            }
            if($current_page <= 1){
                $prev_page_url = null;
            } else {
                $prev_page_url= $urlprev.'&page='.($current_page-1).'&perpage='.$perpage;
            }
            return [
                'total' => $total,
                'per_page'=> $perpage,
                'current_page'=> $current_page,
                'last_page'=> $lastpage,
                'next_page_url'=> $next_page_url,
                'prev_page_url'=> $prev_page_url,
                'from'=> $from+1,
                'to'=> $to,
                'data' => $datas,
            ];   
    }
 
} 

