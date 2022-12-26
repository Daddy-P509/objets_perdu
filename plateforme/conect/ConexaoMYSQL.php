<?php

class ConexaoMYSQL{
    private static $instance = null;
	protected static $persistent = false;
	public static function getInstance() {
		if (self::$persistent != FALSE)
			self::$persistent = TRUE;
		if (! isset ( self::$instance )) {
			try {
				self::$instance = new PDO ( "mysql:host=localhost;dbname=objets_db", "root", "", array (
						PDO::ATTR_PERSISTENT => self::$persistent 
				) );
				self::$instance->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch ( PDOException $ex ) {
				exit ( "Erro ao conectar com o banco de dados: " . $ex->getMessage () );
			}
		}
		return self::$instance;
	}
	public static function close() {
		if (self::$instance != null)
			self::$instance = null;
	}
}