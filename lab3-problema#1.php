<?php
class Empleado {
    private $nombre;
    private $cedula;
    private $edad;
    private $sueldo_bruto;
    private $segurosocial;
    private $impuestorenta;
    private $sueldo_neto;

    public function __construct($nombre, $cedula, $edad, $sueldo_bruto) {
        $this->nombre = $nombre;
        $this->cedula = $cedula;
        $this->edad = $edad;
        $this->sueldo_bruto = $sueldo_bruto;
        
        $this->CalcularSS();
        $this->CalcularIR();
        $this->setSueldoNeto();
    }

    public function getNombre() { return $this->nombre; }
    public function getCedula() { return $this->cedula; }
    public function getEdad() { return $this->edad; }
    public function getSueldoBruto() { return $this->sueldo_bruto; }
    public function getSeguroSocial() { return $this->segurosocial; }
    public function getImpuestoRenta() { return $this->impuestorenta; }
    public function getSueldoNeto() { return $this->sueldo_neto; }

    public function CalcularSS() {
        $this->segurosocial = $this->sueldo_bruto * 0.1250;
    }

    public function CalcularIR() {
        $ganancia_anual = $this->sueldo_bruto * 12;
        if ($ganancia_anual < 11000) {
            $tasa = 0.0;
        } elseif ($ganancia_anual >= 11000 && $ganancia_anual < 50000) {
            $tasa = 0.15;
        } else {
            $tasa = 0.25;
        }
        $this->impuestorenta = $this->sueldo_bruto * $tasa;
    }

    public function setSueldoNeto() {
        $this->sueldo_neto = $this->sueldo_bruto - ($this->segurosocial + $this->impuestorenta);
    }
}

echo "\n--- CALCULAR SALARIO NETO ---\n";
$nombre = readline("Ingrese el nombre del empleado: ");
$cedula = readline("Ingrese la cédula: ");
$edad = (int) readline("Ingrese la edad: ");
$sueldo = (float) readline("Ingrese el sueldo bruto mensual: ");

$emp = new Empleado($nombre, $cedula, $edad, $sueldo);

echo "\n--- VOLANTE DE PAGO GENERADO ---\n";
echo "Empleado: " . $emp->getNombre() . "\n";
echo "Cédula: " . $emp->getCedula() . "\n";
echo "Edad: " . $emp->getEdad() . " años\n";
echo "Sueldo Bruto: $" . number_format($emp->getSueldoBruto(), 2) . "\n";
echo "Deducción Seguro Social (12.5%): $" . number_format($emp->getSeguroSocial(), 2) . "\n";
echo "Deducción Impuesto de Renta: $" . number_format($emp->getImpuestoRenta(), 2) . "\n";
echo "---------------------------------\n";
echo "SUELDO NETO A PAGAR: $" . number_format($emp->getSueldoNeto(), 2) . "\n";
?>