<?php
declare(strict_types=1);

trait EmpleadoTrait {
    private $salario;

    public function setSalario(float $salario): void {
        $this->salario = $salario;
    }

    public function getSalario(): float {
        return $this->salario;
    }

    public function getInfoEmpleado(): string {
        return "Salario: $" . number_format($this->salario, 2);
    }
}