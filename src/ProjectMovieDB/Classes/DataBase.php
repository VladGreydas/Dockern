<?php
class DataBase
{

    public $connection;

    /**
     * Connection to database
     */
    public function __construct()
    {
        $this->connection = new PDO('mysql:host=database;dbname=projectdb;charset=utf8mb4', 'myuser', 'secret');
    }
    /**
     * Returns short movies list (without description) from DB
     * @return array
     */
    public function GetMoviesListShort(): array
    {
        return $list = ($this->connection->query('SELECT id, title, poster_link, genre, date_production FROM movies'))->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Returns full movies list (with description) from DB
     * @return array
     */
    public function GetFullMoviesList(): array
    {
        return $list = ($this->connection->query('SELECT * FROM movies'))->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Returns information about single movie
     * @param int ID Requested movie ID
     * @return array
     */
    public function GetSingleMovie(int $ID): array
    {
        return $list = ($this->connection->query('SELECT * FROM movies WHERE id = ' . $ID . ''))->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteRecord(int $ID)
    {
        $result = ($this->connection->query('DELETE FROM movies WHERE id = ' . $ID . ''));
    }

    public function AddRecord(string $title, string $genre, string $date, string $description, string $poster)
    {
        $stmt = $this->connection->prepare('INSERT INTO movies ( title, genre, date_production, description, poster_link) VALUES (:title, :genre, :date, :description,:poster)');
        $stmt->execute(['title' => $title, 
        'genre' => $genre, 
        'date' => $date, 
        'description' => $description, 
        'poster' => $poster]);
    }

    public function ChangeRecord(int $id, string $title, string $genre, string $date, string $description, string $poster)
    {
        $stmt = $this->connection->prepare('UPDATE movies SET title= :title, genre=:genre, date_production= :date, description= :description,poster_link= :poster WHERE id = :id');
        $stmt->execute(['title' => $title, 
        'genre' => $genre, 
        'date' => $date, 
        'description' => $description, 
        'poster' => $poster, 
        'id' => $id]);
    }
}
