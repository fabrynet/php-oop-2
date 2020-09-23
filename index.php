<?php
// GOAL: nell'ottica di quanto visto a lezione definire classe Square e classe Cube (2 e 3 dimensioni);
// definire, oltre a variabili d'istanza, costruttore, e toString, i metodi per il calcolo dell'area/volume e del perimetro/superficie
// cercando di sfruttare al meglio ereditarieta' e polimorfismo;
// testare le classi definite con alcune istanze per verificare che sia tutto corretto
//
// Note:
// area quadrato: lato * lato
// perimetro quadrato: 4 * lato
// volume cubo: lato * lato * lato
// superficie cubo: 6 * lato * lato
//
// N.B.: definire ogni variabile e metodo pubblico come detto in classe

class Square {

  protected $lato;

  public function getLato() {
    $this -> lato;
  }

  public function setLato($lato) {
    if (is_numeric($lato)) {
      $this -> lato = $lato;
    } else {
      $this -> lato = "Errore -> '$lato': inserisci solo valori numerici";
    }
  }

  public function __construct($lato) {
    $this -> setLato($lato);
  }

  protected function getPer() {
    return 4 * $this -> lato;
  }

  protected function getArea() {
    return pow($this -> lato, 2);
  }

  protected function getStrSquare() {
    return
      "Lato: ".$this -> lato."<br>"
      ."Perimetro: ". $this -> getPer()."<br>"
      ."Area: ". $this -> getArea()."<br>";
  }

  public function __toString() {
    return
      "<h3>Quadrato</h3>"
      .$this -> getStrSquare();
  }

}

class Cube extends Square {

  protected function getSup() {
    return parent::getArea() * 6;
  }

  protected function getVol() {
    return parent::getArea() * $this -> lato;
  }

  protected function getStrCube() {
    return
      parent::getStrSquare()
      ."Superficie: ". $this -> getSup()."<br>"
      ."Volume: ". $this -> getVol()."<br>";
  }

  public function __toString() {
    return
      "<h3>Cubo</h3>"
      .$this -> getStrCube();
  }

}

$square = new Square(20);
echo $square;
$square -> setLato(15.5);
echo $square;
$square -> setLato('hello');
echo $square;

$cube = new Cube(10);
echo $cube;
$cube -> setLato(15);
echo $cube;
$cube -> setLato('hello');
echo $cube;

 ?>
