<?
include("/home/greyda/Projects/Dockern/src/ProjectMovieDB/config.php");
require('DateUtilite.php');
require(ROOTS.'/Classes/DataBase.php');
class DataProcessor
{   
    private $DB;
    
    private static $instance = null;

    private function __construct()
    {
        $this->DB = new DataBase();
    }

    public static function GetInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function GetData(int $opcode, int $ID = 0) : array
    {
        switch($opcode){
            case 1:{$list = $this->DB->GetMoviesListShort(); break;}
            case 2:{$list = $this->DB->GetFullMoviesList(); break;}
            case 3:{
                $list = $this->DB->GetSingleMovie($ID); 
                return $list;
                break;}
        }
        for($i = 0; $i < count($list); $i++){
            $date = $list[$i]['date_production'];
            $list[$i]['date_production'] = ProcessSingleDate($date);
        }
        return $list;
    }

    public function AddData(string $title, string $genre, string $date, string $description, string $poster){
        $this->DB->AddRecord($title, $genre, $date, $description, $poster);
    }

    public function ChangeData(int $id, string $title, string $genre, string $date, string $description, string $poster){
        $this->DB->ChangeRecord($id, $title, $genre, $date, $description, $poster);
    }

    public function DeleteData(int $ID)
    {
        $this->DB->DeleteRecord($ID);
    }

    private function __clone()
    {
        
    }

    private function __wakeup()
    {
        
    }
}