<?php
namespace F1Data\HttpAdapter;
interface HttpAdapterInterface {
    public function __construct($basePath);
    public function setBasePath ($basePath);
    public function get ($path);
}