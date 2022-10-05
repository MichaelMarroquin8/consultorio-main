<?php
    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                //Local
				$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=consultorio","root","");
                //Produccion
                // $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=usenacg4qf_consultorio","usenacg4qf_consultorio","Consultoriosena");
				return $conectar;
			} catch (Exception $e) {
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        }

        public function set_names(){
			return $this->dbh->query("SET NAMES 'utf8'");
        }

        public static function ruta(){
            //Produccion
			// return "http://consultorio.senacgts.org/";
            //Local
            return "http://localhost/Consultorio-master/";
		}

    }
?>