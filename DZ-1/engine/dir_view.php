<?php
class dir_view {
    private $list_dirs;
    private $path;

    static $_instance;

    static function get_instance($path = FALSE){
        if (self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new self($path);
    }

    private function __construct($path){

        if ($path) {
            $this->path = $path.'/';
            $path = '/'.$path;
        }

        $this->list_dirs = new DirectoryIterator(ROOT_DIR.$path);
        return $this->list_dirs;
    }

    public function  dirs_to_array(){
        $arr = array();
        $i = 0;

        foreach ($this->list_dirs as $res){
            if(!$res->isDot()){
                $file_name = $res->getFilename();

                if ($res->isDir()){
                    $arr['dirs'][$i][$file_name] = $this->path.$file_name;
                }
                else if ($res->isFile()){
                    $arr['files'][$i][$file_name] = $res->getSize();
                }

                $i++;
            }
        }

        $arr['old_path'] = substr($this->path,0,strrpos($this->path,'/',-2));

        return $arr;
    }
}