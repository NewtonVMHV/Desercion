<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'alumno-list',
            'alumno-create',
            'alumno-edit',
            'alumno-delete',
            'carrera-list',
            'carrera-create',
            'carrera-edit',
            'carrera-delete',
            'departamento-list',
            'departamento-create',
            'departamento-edit',
            'departamento-delete',
            'materia-list',
            'materia-create',
            'materia-edit',
            'materia-delete',
            'docente-list',
            'docente-create',
            'docente-edit',
            'docente-delete',
            'periodo-list',
            'periodo-create',
            'periodo-edit',
            'periodo-delete',
            'motivos-list',
            'motivos-create',
            'motivos-edit',
            'motivos-delete',
            'semanas-list',
            'semanas-create',
            'semanas-edit',
            'semanas-delete',
            'reporte-list',
            'reporte-create',
            'reporte-edit',
            'reporte-delete',
            'reporte-export',
            'alerta-inasistencia-filter',
            'alerta-inasistencia-edit',
            'alerta-inasistencia-delete',
            'alerta-calificaciones-filter',
            'alerta-calificaciones-edit',
            'alerta-calificaciones-delete',
            'inasistencia-list',
            'inasistencia-create',
            'inasistencia-edit',
            'inasistencia-delete',
            'calificaciones-list',
            'calificaciones-create',
            'calificaciones-edit',
            'calificaciones-delete',
            'Muestra-Calificaciones-list',
            'registro-alumno-list',
            'registro-alumno-create',
            'registro-alumno-edit',
            'registro-alumno-delete',
            'registro-alumno-export',
            'registro-docente-list',
            'registro-docente-create',
            'registro-docente-edit',
            'registro-docente-delete',
            'registro-docente-export',
            'registro-externo-list',
            'registro-externo-create',
            'registro-externo-edit',
            'registro-externo-delete',
            'registro-externo-export',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
