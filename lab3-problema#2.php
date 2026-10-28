<?php
class Cilindro {
    private $radio;
    private $altura;

    public function __construct($radio, $altura) {
        $this->radio = $radio;
        $this->altura = $altura;
    }

    public function calcularAreaLateral() {
        return 2 * M_PI * $this->radio * $this->altura;
    }

    public function calcularAreaTotal() {
        return 2 * M_PI * $this->radio * ($this->altura + $this->radio);
    }

    public function calcularVolumen() {
        return M_PI * pow($this->radio, 2) * $this->altura;
    }
}


echo "\n--- DATOS DEL CILINDRO ---\n";
$R = (float) readline("Ingrese el radio (R) del cilindro: ");
$H = (float) readline("Ingrese la altura (H) del cilindro: ");

$cil = new Cilindro($R, $H);

echo "\n--- CÁLCULOS DEL CILINDRO ---\n";
echo "Área Lateral: " . round($cil->calcularAreaLateral(), 4) . "\n";
echo "Área Total: " . round($cil->calcularAreaTotal(), 4) . "\n";
echo "Volumen: " . round($cil->calcularVolumen(), 4) . "\n";
?>