<?php
namespace F1Data\Adapter\Http;
use F1Data\Adapter\AdapterInterface;

interface HttpAdapterInterface extends AdapterInterface {
    public function __construct($basePath);
    public function setBasePath ($basePath);
    public function get ($path);
}