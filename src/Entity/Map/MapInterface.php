<?php
namespace F1Data\Entity\Map;
Interface MapInterface {
    public function fromXML (\SimpleXMLElement $xml);
    public function fromRow ($row);
    public function toArray ();
}