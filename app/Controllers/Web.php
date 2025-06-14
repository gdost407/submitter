<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WebModel;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Email\Email;

class Web extends BaseController
{
  public function index(): string
  {
    return view('Web-Home');
  }

  public function docs(): string
  {
    return view('Web-Docs');
  }

  public function docsAjax(): string
  {
    return view('Web-Docs-Ajax');
  }

  public function docsTemplate(): string
  {
    return view('Web-Docs-Template');
  }

  public function examples(): string
  {
    return view('Web-Example');
  }

  public function contact(): string
  {
    return view('Web-Contact');
  }
}

