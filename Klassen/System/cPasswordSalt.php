<?php


	/* 	
		===================================================
		Name: cPasswordSalt.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung: Klasse zur generierung von Salz
		===================================================
	*/
	
	// Includes //
	class cPasswordSalt
	{
		// Klassenvariablen //
		private $length;
		private $salt = "";
		
		// Chars aus denen das Salz generiert wird //
		private $randomChars = array(1 => "!", 2 => "§", 3 => "%", 4 => "&", 5 => "/", 6 => "(", 7 => ")", 8 => "=", 9 => "A", 10 => "B", 11 => "C", 12 => "D", 13 => "E", 14 => "F", 15 => "G", 16 => "H", 17 => "I", 18 => "J", 19 => "K", 20 => "L", 21 => "M", 22 => "N", 23 => "O", 24 => "P");
		
		// Constructor
		function __construct($length)
		{
			// Laenge Setzen
			$this->length = $length;
			
			// Salz generieren
			$this->generateSalt();
		}
		
		// genrateSalt
		// Generiert den Salz;
		private function generateSalt()
		{
			// Das Zeichen als Variable
			$startInt = 0;
			
			if(!isset($salt))
			{
				// Tue
				do
				{
					// Erhoehe Char
					$startInt 	= $startInt+1;
					
					// Fuege String mit zufaelligen Character aus dem Array zusammen
					$this->salt		= $this->salt.$this->randomChars[rand(1, count($this->randomChars))];
				
				}while($startInt <= $this->length);
			}
			
			// Zurueckgeben
			return $this->salt;
		}
		
		// getSalt();
		// Generiert den Salz;
		public function getSalt()
		{
			// Existiert der Salz?
			if(isset($this->salt))
			{
				// Rueckgabe
				return $this->salt;
			}
			
			return false;
		}
		
		// Destructor
		function __destruct()
		{
			
		}
	}
?>