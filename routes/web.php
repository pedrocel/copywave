<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Cliente\DashboardController as ClienteDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as ProductLibraryController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\ControllerController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Cliente\PageController as ClientePageController;
use App\Http\Controllers\Cliente\DomainController as ClienteDomainController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ResolveSubdomain;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfilController;
use App\Http\Middleware\RedirectByProfile;
use App\Http\Controllers\SubscriptionController;
use App\Models\PlanModel;   

Route::get('/', [PageController::class, 'landingPage'])->name('landingPage');

Route::get('/astro', function () {
    return view('astrolus');
});

Route::get('/termos', function () {
    return view('terms');
});

Route::get('/privacidade', function () {
    return view('privacy');
});

Route::get('/cookies', function () {
    return view('cookies');
});

Route::get('/lp', function () {
    $plans = PlanModel::where('status', 1)->get();
    return view('welcome', compact('plans'));
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/create-subscription', [SubscriptionController::class, 'create'])->name('sunscription.create');

Route::middleware([ResolveSubdomain::class])->group(function () {
    Route::get('/', [PageController::class, 'show']);
});

Route::domain('{subdomain}.copywave.com.br')->group(function () {
    Route::get('/', function ($subdomain) {
        return "Você acessou o subdomínio: $subdomain";
    });
});

Route::middleware(['auth', RedirectByProfile::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('pages', [PageController::class, 'store'])->name('pages.store');
    Route::get('pages/{name}', [PageController::class, 'showByName'])->name('pages.show');
    Route::get('pages/{name}/detail', [PageController::class, 'detail'])->name('pages.detail');
    Route::delete('pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
    Route::patch('pages/{id}/toggle-status', [PageController::class, 'toggleStatus'])->name('pages.toggleStatus');
    Route::get('cloneTest', [PageController::class, 'cloneTest'])->name('pages.cloneTest');
    Route::post('pages/{id}/attach-domain', [PageController::class, 'attachDomain'])->name('pages.attachDomain');
    Route::delete('pages/{id}/detach-domain', [PageController::class, 'detachDomain'])->name('pages.detachDomain');
    Route::get('/check-cname', [PageController::class, 'checkCname']);

    Route::get('/organizacoes', [OrganizationController::class, 'index'])->name('admin.organizacoes.index');
    Route::get('/organizacoes/create', [OrganizationController::class, 'create'])->name('admin.organizacoes.create');
    Route::post('/organizacoes', [OrganizationController::class, 'store'])->name('admin.organizacoes.store');
    Route::get('/organizacoes/{organizacao}/edit', [OrganizationController::class, 'edit'])->name('admin.organizacoes.edit');
    Route::put('/organizacoes/{organizacao}', [OrganizationController::class, 'update'])->name('admin.organizacoes.update');
    Route::delete('/organizacoes/{organizacao}', [OrganizationController::class, 'destroy'])->name('admin.organizacoes.destroy');

    Route::get('/perfis', [PerfilController::class, 'index'])->name('admin.perfis.index');
    Route::get('/perfis/create', [PerfilController::class, 'create'])->name('admin.perfis.create');
    Route::post('/perfis', [PerfilController::class, 'store'])->name('admin.perfis.store');
    Route::get('/perfis/{perfil}/edit', [PerfilController::class, 'edit'])->name('admin.perfis.edit');
    Route::put('/perfis/{perfil}', [PerfilController::class, 'update'])->name('admin.perfis.update');
    Route::delete('/perfis/{perfil}', [PerfilController::class, 'destroy'])->name('admin.perfis.destroy');

    Route::prefix('/lojas')->group(function () {
        Route::get('/', [StoreController::class, 'index'])->name('admin.stores.index');
        Route::get('/criar', [StoreController::class, 'create'])->name('admin.stores.create');
        Route::post('/', [StoreController::class, 'store'])->name('admin.stores.store');
        Route::get('{id}', [StoreController::class, 'show'])->name('admin.stores.show');
        Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('admin.stores.edit');
        Route::put('{id}', [StoreController::class, 'update'])->name('admin.stores.update');
        Route::delete('{id}', [StoreController::class, 'destroy'])->name('admin.stores.destroy');
    });

    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    
    Route::prefix('produtos')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/criar', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('{id}', [ProductController::class, 'show'])->name('admin.products.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

    Route::get('domains', [DomainController::class, 'index'])->name('domains.index');
    Route::get('domains/create', [DomainController::class, 'create'])->name('domains.create');
    Route::post('domains', [DomainController::class, 'store'])->name('domains.store');
    Route::get('domains/{domain}/edit', [DomainController::class, 'edit'])->name('domains.edit');
    Route::put('domains/{domain}', [DomainController::class, 'update'])->name('domains.update');
    Route::delete('domains/{domain}', [DomainController::class, 'destroy'])->name('domains.destroy');
    Route::post('domains/{domain}/attach-page', [DomainController::class, 'attachPage'])->name('domains.attachPage');


    Route::prefix('categorias')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/criar', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::prefix('plans')->group(function () {
        Route::get('/', [PlanController::class, 'index'])->name('admin.plans.index');
        Route::get('/create', [PlanController::class, 'create'])->name('admin.plans.create');
        Route::post('/create', [PlanController::class, 'store'])->name('admin.plans.store');
        Route::get('/edit/{plan}', [PlanController::class, 'edit'])->name('admin.plans.edit');
        Route::put('/edit/{plan}', [PlanController::class, 'update'])->name('admin.plans.update');
        Route::delete('{plan}', [PlanController::class, 'destroy'])->name('admin.plans.destroy');
        // Route::get('/criar', [CategoryController::class, 'create'])->name('admin.categories.create');
        // Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
    });

    Route::get('product/detail/{id}', [ProductLibraryController::class, 'detail'])->name('admin.products.detail');

});

Route::middleware(['auth', RedirectByProfile::class])->prefix('cliente')->group(function () {
    Route::get('/dashboard', [ClientePageController::class, 'index'])->name('dashboard');
    Route::get('/plan', [ClienteDashboardController::class, 'plan'])->name('subscription.purchase');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/favoritar-produto/{id}', [ProductLibraryController::class, 'toggleFavorite'])->name('product.toggleFavorite');

    Route::get('pages', [ClientePageController::class, 'index'])->name('cliente.pages.index');
    Route::get('pages/create', [ClientePageController::class, 'create'])->name('cliente.pages.create');
    Route::post('pages', [ClientePageController::class, 'store'])->name('cliente.pages.store');
    Route::get('pages/{name}', [ClientePageController::class, 'showByName'])->name('cliente.pages.show');
    Route::get('pages/{name}/detail', [ClientePageController::class, 'detail'])->name('cliente.pages.detail');
    Route::delete('pages/{id}', [ClientePageController::class, 'destroy'])->name('cliente.pages.destroy');
    Route::patch('pages/{id}/toggle-status', [ClientePageController::class, 'toggleStatus'])->name('cliente.pages.toggleStatus');
    Route::get('cloneTest', [ClientePageController::class, 'cloneTest'])->name('cliente.pages.cloneTest');
    Route::post('pages/{id}/attach-domain', [ClientePageController::class, 'attachDomain'])->name('cliente.pages.attachDomain');
    Route::delete('pages/{id}/detach-domain', [ClientePageController::class, 'detachDomain'])->name('cliente.pages.detachDomain');
    Route::get('/check-cname', [ClientePageController::class, 'cliente.checkCname']);

    Route::get('domains', [ClienteDomainController::class, 'index'])->name('cliente.domains.index');
    Route::get('domains/create', [ClienteDomainController::class, 'create'])->name('cliente.domains.create');
    Route::post('domains', [ClienteDomainController::class, 'store'])->name('cliente.domains.store');
    Route::get('domains/{domain}/edit', [ClienteDomainController::class, 'edit'])->name('cliente.domains.edit');
    Route::put('domains/{domain}', [ClienteDomainController::class, 'update'])->name('cliente.domains.update');
    Route::delete('domains/{domain}', [ClienteDomainController::class, 'destroy'])->name('cliente.domains.destroy');
    Route::post('domains/{domain}/attach-page', [ClienteDomainController::class, 'attachPage'])->name('cliente.domains.attachPage');
});

require __DIR__.'/auth.php';
