import { Component, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
// Importar el componente Tareas
import { Tareas } from './tareas/tareas';
@Component({
  selector: 'app-root',
  // Agregar Tareas a los imports para usar el componente
  imports: [RouterOutlet, Tareas],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App {
  protected readonly title = signal('Majo');
}
