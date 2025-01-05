<?php

use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\MerchandiseController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\TicketController;
use App\Http\Controllers\Dashboard\OrderMerchandiseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Merchandise;
use App\Models\Ticket;
use App\Models\User;

Route::get('/', function () {
    return redirect()->route('home');
})->name('home');

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

// Login
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Sign Up
Route::get('/sign-up', [AuthController::class, 'signUpPage'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('dashboard')->name('dashboard.')->group(function () {
    // Dashboard
    Route::get('', function () {
        $users = User::latest()->limit(3)->get();
        $articles = Article::latest()->limit(3)->get();
        $total_user = User::count();
        $total_article = Article::count();
        return view('dashboard.dashboard', compact('users', 'articles', 'total_user', 'total_article'));
    })->name('index');

    // User Admin
    Route::get('admin/download', [AdminController::class, 'download_pdf'])->name('admin.download_pdf');
    Route::resource('admin', AdminController::class);

    // Merchandise Admin
    Route::resource('merchandise', MerchandiseController::class);

    // Order Merchandise admin
    Route::resource('order-merchandise', OrderMerchandiseController::class);
    Route::get('/orders/{order}', [OrderMerchandiseController::class, 'show'])->name('order.show');


    // Ticket Admin
    Route::get('ticket/download', [TicketController::class, 'download_pdf'])->name('ticket.download_pdf');
    Route::resource('ticket', TicketController::class);

    // Article Admin
    Route::get('article/download', [ArticleController::class, 'export_excel'])->name('article.export_excel');
    Route::resource('article', ArticleController::class);

    // Gallery Admin
    Route::get('gallery/download', [GalleryController::class, 'download_pdf'])->name('gallery.download_pdf');
    Route::resource('gallery', GalleryController::class);
});


// Article Users
Route::get('/article', function () {
    $articles = Article::latest()->paginate(6);
    return view('user.article.index', ['title' => 'Article', 'articles' => $articles]);
})->name('user.article.index');

Route::get('/article/show/{article}', function (Article $article) {
    return view('user.article.show', ['title' => 'Detail Article', 'article' => $article]);
})->name('user.article.show');

// Ticket Users
Route::get('/ticket', function () {
    $tickets = Ticket::all();
    return view('user.ticket.index', ['title' => 'Ticket', 'tickets' => $tickets]);
})->name('user.ticket.index');

Route::get('/ticket/show/{ticket}', function (Ticket $ticket) {
    if (!$ticket->is_available) {
        return redirect()->route('user.ticket.index');
    }
    $tickets = Ticket::all();
    return view('user.ticket.show', ['title' => 'Detail Ticket', 'ticket' => $ticket, 'tickets' => $tickets]);
})->name('user.ticket.show');

// Gallery Users
Route::get('/gallery', function () {
    $galleries = Gallery::latest()->get();
    return view('user.gallery.index', ['title' => 'Gallery', 'galleries' => $galleries]);
})->name('user.gallery.index');

// Merchandise Users
Route::get('/merchandise', function () {
    $merchandise = Merchandise::latest()->get();
    return view('user.merchandise.index', [
        'title' => 'Merchandise',
        'merchandise' => $merchandise 
    ]);
})->name('user.merchandise.index');

// User Routes
Route::middleware('auth')->group(function () {
    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{merchandise}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
});

// Routes untuk checkout
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
    
});

Route::get('/checkout/success', function () {
    return view('user.checkout.success', ['title' => 'Pembayaran Sukses']);
})->name('checkout.success');

Route::get('/checkout/pending', function () {
    return view('user.checkout.pending', ['title' => 'Pembayaran Pending']);
})->name('checkout.pending');

Route::get('/checkout/error', function () {
    return view('user.checkout.failure', ['title' => 'Pembayaran Gagal']);
})->name('checkout.error');


Route::post('/midtrans-callback', [CheckoutController::class, 'callback']);

Route::get('/invoice/{id}', [CheckoutController::class, 'invoice'])->name('user.invoice');
Route::get('/invoice/export/{id}', [CheckoutController::class, 'exportInvoice'])->name('user.invoice.export');


