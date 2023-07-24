<?php

namespace Database\Seeders;

use App\Models\MotivosFaltas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivosFaltasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //
        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Motivos Personales';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Enfermedad';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Transporte';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Salud Familiar';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Economía';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Desconocido';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Falta Grupal';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Desertor';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'No Inscrito';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Baja';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Tutorías';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Permiso Docente';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();

        $motivosFaltas = new MotivosFaltas();
        $motivosFaltas->Motivo = 'Día Inhabil';
        $motivosFaltas->Estatus = '0';
        $motivosFaltas->save();
    }
}
