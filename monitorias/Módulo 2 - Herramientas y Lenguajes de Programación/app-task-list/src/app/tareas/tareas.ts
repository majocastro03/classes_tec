import { Component } from '@angular/core';
// Agregar FormsModule para usar ngModel
import { FormsModule } from '@angular/forms';
// Importar el type Tarea
import { Tarea } from '../models/tarea';
// Importar el type Universidad
import { Universidad } from '../models/universidad';

@Component({
  selector: 'app-tareas',
  // Agregar FormsModule a los imports para usar ngModel
  imports: [FormsModule],
  templateUrl: './tareas.html',
  styleUrls: ['./tareas.css']
})
export class Tareas {
  // Declarar un arreglo de tareas de tipo Tarea vacío
  tareas: Tarea[] = [];
  universidades: Universidad[] = [];

  // Variable para enlazar con el input del HTML
  nuevaTarea: string = '';
  // Contador para asignar IDs únicos a las tareas
  contadorId: number = 1;

agregarNuevaTarea(nombreTarea: string) {
  // Crear una nueva tarea usando el modelo Tarea
  if(nombreTarea !== '') {
    //Imprimir verdadero
    console.log("Verdadero");
  }
}









  // Método para agregar una nueva tarea
  agregarTarea(nuevaTarea: string) {
    // Agregar una nueva tarea solo si el campo no está vacío
    if (this.nuevaTarea !== '') {
      // Crear una nueva tarea usando el modelo Tarea
      const tarea: Tarea = {
        id: 1,
        descripcion: nuevaTarea,
        completada: false,
        fechaCreacion: '2025-09-19',
        nota: 5,
        fechaVencimiento: '2025-09-28'
      };
      // Agregar la nueva tarea al arreglo de tareas
      this.tareas.push(tarea);
      // Limpiar el campo de entrada y actualizar el contador de IDs
      this.nuevaTarea = '';
      // Incrementar el contador de IDs
      this.contadorId = this.contadorId + 1;
    }
  }
  // Método para eliminar una tarea por su índice
  eliminarTarea(index: number) {
    // Eliminar la tarea en la posición dada por el índice
    this.tareas.splice(index, 1);
  }

  // OPCIÓN 1: Eliminar tarea usando filter
  eliminarTareaConFilter(index: number) {
    // Crear un nuevo array sin la tarea en el índice especificado
    this.tareas = this.tareas.filter((tarea, i) => i !== index);
  }

  // OPCIÓN 2: Eliminar tarea creando un nuevo array manualmente
  eliminarTareaManual(index: number) {
    // Crear un nuevo array vacío
    const nuevasTareas: Tarea[] = [];
    // Recorrer todas las tareas
    for (let i = 0; i < this.tareas.length; i++) {
      // Agregar todas las tareas excepto la que está en el índice a eliminar
      if (i !== index) {
        nuevasTareas.push(this.tareas[i]);
      }
    }
    // Reemplazar el array original con el nuevo array
    this.tareas = nuevasTareas;
  }
}