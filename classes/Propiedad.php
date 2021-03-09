<?php
    
    namespace App;

    class Propiedad {

        // Base de Datos
        protected static $db;
        protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

        // Errores
        protected static $errores = [];

        public $id;
        public $titulo;
        public $precio;
        public $imagen;
        public $descripcion;
        public $habitaciones;
        public $wc;
        public $estacionamiento;
        public $creado;
        public $vendedorId;

        public function __construct($args = []) {
            $this->id = $args['id'] ?? '';
            $this->titulo = $args['titulo'] ?? '';
            $this->precio = $args['precio'] ?? '';
            $this->imagen = $args['imagen'] ?? 'imagen.jpg';
            $this->descripcion = $args['descripcion'] ?? '';
            $this->habitaciones = $args['habitaciones'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->estacionamiento = $args['estacionamiento'] ?? '';
            $this->creado = date('Y/m/d') ?? '';
            $this->vendedorId = $args['vendedorId'] ?? '';
        }

        public function guardar() {

            // Sanitizar los datos
            $atributos = $this->sanitizarDatos();

            // Insertar en la Base de datos
            $query = "INSERT INTO propiedades (";
            $query .= join(', ', array_keys($atributos));
            $query .= ") VALUES ('";
            $query .= join("', '", array_values($atributos));
            $query .= "');";

            $resultado = self::$db->query($query);
        }

        // Definir la conexion a la bbdd
        public static function setDB($database) {
            self::$db = $database;
        }

        // Identificar y unir los atributos de la BD
        public function atributos()
        {
            $atributos = [];
            foreach (self::$columnasDB as $columna) {
                if ($columna === 'id') continue;
                // Se rellena el array con los indices igual a las columnas de la BD y se rellena con los valores de los atributos de la clase.
                $atributos[$columna] = $this->$columna;
            }
            return $atributos;
        }

        public function sanitizarDatos() {
            $atributos = $this->atributos();
            $sanitizado = [];

            foreach ($atributos as $key => $value) {
                $sanitizado[$key] = self::$db->escape_string($value);
            }
            return $sanitizado;
        }

        // Validacion
        public static function getErrores()
        {
            return self::$errores;
        }

        public function validar()
        {
            if (!$this->titulo) {
                self::$errores[] = 'Debes añadir un titulo';
            }

            if (!$this->precio) {
                self::$errores[] = 'El precio es obligatorio';
            }

            if (!$this->descripcion || strlen($this->descripcion) < 40) {
                self::$errores[] = 'La descripción es obligatoria y debe tener al menos 40 caracteres';
            }

            if (!$this->habitaciones) {
                self::$errores[] = 'El número de habitaciones es obligatorio';
            }

            if (!$this->wc) {
                self::$errores[] = 'El número de baños es obligatorio';
            }

            if (!$this->estacionamiento) {
                self::$errores[] = 'El número de lugares de estacionamiento es obligatorio';
            }

            if (!$this->vendedorId) {
                self::$errores[] = 'Elige un vendedor';
            }

            // if (!$this->imagen['name'] || $this->imagen['error']) {
            //     self::$errores[] = 'La imágen es obligatoria';
            // }

            // // Validar imagen por peso
            // $medida = 1000 * 4000;

            // if ($this->imagen['size'] > $medida) {
            //     self::$errores[] = 'La imágen es muy pesada';
            // }

            return self::$errores;
        }
    }