<?php
    class contato
    {
        private $id;
        private $name;
        private $phone;
        private $observations;

        public function __construct($id = null, $name = null, $phone = null, $observations = null)
        {
            $this->id = $id;
            $this->name = $name;
            $this->phone = $phone;
            $this->observations = $observations;
        }

        public function getId()
        {
            return $this->id;
        }
        public function getName()
        {
            return $this->name;
        }
        public function getPhone()
        {
            return $this->phone;
        }
        public function getObservations()
        {
            return $this->observations;
        }
    }

?>