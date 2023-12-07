<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\Pista;
use Illuminate\Http\Request;

class PistaController extends Controller
{
    public function generatePistasForAllParticipantes()
    {
        $participantes = Participante::all();

        foreach ($participantes as $participante) {
            $this->generatePistasForParticipante($participante);
        }
    }
    private function generatePistasForParticipante(Participante $participante)
    {
        $mesNacimiento = \Carbon\Carbon::parse($participante->f_nacimiento)->format('m');
        $nombreMes = $this->numeroAMes($mesNacimiento);


  
        // Pista 1: Mes de nacimiento

        $this->createPista($participante->cedula, 'Mes de Nacimiento', $nombreMes);

        // Pista 2: Agencia
        $this->createPista($participante->cedula, 'Agencia', $participante->agencia);

        // Pista 3: Ciudad
        $this->createPista($participante->cedula, 'Ciudad', $participante->ciudad);

        // Pista 4: Género
        $this->createPista($participante->cedula, 'Género', $participante->genero);

        // Pista 5: Departamento
        $this->createPista($participante->cedula, 'Departamento', $participante->departamento);

        // Pista 6: Sumatoria
        $sumatoria = array_sum(str_split(str_replace(['-', ' '], '', $participante->f_nacimiento)));
        $this->createPista($participante->cedula, 'Sumatoria', $sumatoria);

        $sumatoriaTelefono = array_sum(str_split($participante->telefono));
        $this->createPista($participante->cedula, 'Sumatoria Teléfono', $sumatoriaTelefono);
    
        // Pista: Último dígito de la cédula
        $ultimoDigitoCedula = substr($participante->cedula, -1);
        $this->createPista($participante->cedula, 'Último Dígito Cédula', $ultimoDigitoCedula);
    
        // Pista: Último dígito del teléfono
        $ultimoDigitoTelefono = substr($participante->telefono, -1);
        $this->createPista($participante->cedula, 'Último Dígito Teléfono', $ultimoDigitoTelefono);
    
        // Pista: Última letra del nombre
        $ultimaLetraNombre = substr($participante->nombre, -1);
        $this->createPista($participante->cedula, 'Última Letra Nombre', $ultimaLetraNombre);
    
        // Pista: Última letra del primer apellido
        $ultimaLetraPApellido = substr($participante->p_apellido, -1);
        $this->createPista($participante->cedula, 'Última Letra Primer Apellido', $ultimaLetraPApellido);
    
        // Pista: Última letra del segundo apellido
        $ultimaLetraSApellido = substr($participante->s_apellido, -1);
        $this->createPista($participante->cedula, 'Última Letra Segundo Apellido', $ultimaLetraSApellido);
    }

    private function createPista($cedula, $titulo, $dato)
    {
        Pista::create([
            'fk_cedula' => $cedula,
            'titulo' => $titulo,
            'pista' => $dato,
            'estado' => 0,
        ]);
    }
    
    private function numeroAMes($numeroMes)
{
    $meses = [
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];

    return $meses[$numeroMes] ?? 'Mes Desconocido';
}


    public function mostrarRuleta($cedula)
    {
        $participante = Participante::findOrFail($cedula);
        return view('ruleta', compact('participante'));
    }

    public function obtenerPistaAleatoria($cedula) {
        try {
            // Buscar una pista aleatoria con estado 0
            $pista = Pista::where('fk_cedula', $cedula)
                          ->where('estado', 0) // Agregar filtro de estado
                          ->inRandomOrder()
                          ->first();
    
            if (!$pista) {
                return response()->json(['error' => 'Pista no encontrada'], 404);
            }
    
            // Cambiar el estado de la pista a 1 y guardar
            $pista->estado = 1;
            $pista->save();
    
            return response()->json(['titulo' => $pista->titulo, 'pista' => $pista->pista]);
    
        } catch (\Exception $e) {
            // Manejo de la excepción
            return response()->json(['error' => 'Error del servidor'], 500);
        }
    }
    
    
    


}
