import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Tarea } from '../models/tarea';

@Component({
  selector: 'app-tareas',
  imports: [FormsModule],
  templateUrl: './tareas.html',
  styleUrl: './tareas.css'
})
export class Tareas {
  tareas: Tarea[] = [];
  nuevaTarea: Tarea = { id: 0, descripcion: '', completada: false };
  agregarTarea() {
    if (this.nuevaTarea.descripcion.trim() !== '') {
      this.tareas.push(this.nuevaTarea);
      this.nuevaTarea = { id: 0, descripcion: '', completada: false };
    }
  }

  eliminarTarea(index: number) {
    this.tareas.splice(index, 1);
  }
}