class Tarea {
  constructor(
    public id: number,
    public descripcion: string,
    public completada: boolean = false
  ) {}

  marcarComoCompleta() {
    this.completada = true;
  }
}

const tarea1 = new Tarea(1, "Estudiar Angular");
tarea1.marcarComoCompleta();
