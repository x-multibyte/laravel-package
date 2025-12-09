<?php

namespace XMultibyte\Package;

class Package
{
    public function __construct()
    {
        //
    }
    
    public function getPackageName(): string
    {
        return PackageServiceProvider::PACKAGE_NAME;
    }
    
    public function getVersion(): string
    {
        return PackageServiceProvider::VERSION;
    }
}
