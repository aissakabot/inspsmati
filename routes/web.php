<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*adminpanel */
Route::group(['middleware'=>['web','Admin']],function(){

Route::group(['middleware'=>'Adm'],function(){

/* users datatables*/
Route::get('/adminpanel/users/data','UserController@anyData')->name('adminpanel.users.data');
Route::get('/adminpanel/users/ajax','UserController@anyData1')->name('adminpanel.users.data');
Route::get('/adminpanel/users/affiche','UserController@affiche');
	/*users*/
Route::get('/adminpanel','AdminController@index');
Route::resource('/adminpanel/users','UserController');
Route::post('adminpanel/users/changepassword','UserController@updatepassword');
Route::get('adminpanel/users/{id}/delete','UserController@delete');



/*settigs*/
Route::get('/adminpanel/sitesettings','SiteSettingController@index');
Route::post('/adminpanel/sitesettings','SiteSettingController@store');


/*realisations */
Route::get('/adminpanel/realisations/data','RealisationController@anyData')->name('adminpanel.realisations.data');

	
Route::resource('/adminpanel/realisations','RealisationController');

Route::get('adminpanel/realisations/{id}/delete','RealisationController@delete');
Route::post('adminpanel/realisations/changeimage','RealisationController@changeimage');


Route::get('/adminpanel/realisations/{id}/comments/data','RealisationcommentController@anyData')->name('adminpanel.realisations.comments.data');
Route::get('adminpanel/realisations/{id}/comments','RealisationcommentController@index');


/*activites */
Route::get('/adminpanel/activites/data','ActController@anyData')->name('adminpanel.activites.data');

Route::resource('/adminpanel/activites','ActController');

Route::get('adminpanel/activites/{id}/delete','ActController@delete');
Route::post('adminpanel/activites/changeimage','ActController@changeimage');

/* contact*/

Route::get('/adminpanel/contacts/data','ContactController@anyData');

Route::get('/adminpanel/contacts','ContactController@index');
Route::get('/adminpanel/contacts/{id}/edit','ContactController@edit');
Route::put('/adminpanel/contacts/{id}','ContactController@update')->name('contacts.update');

/*news */
Route::get('/adminpanel/news/data','NewwController@anyData')->name('adminpanel.news.data');

Route::resource('/adminpanel/news','NewwController');

Route::get('adminpanel/news/{id}/news','NewwController@delete');
Route::post('adminpanel/news/changeimage','NewwController@changeimage');


/*cadres */
Route::get('/adminpanel/entreprise/cadres/data','CadreController@anyData')->name('adminpanel.cadres.data');

	
Route::resource('/adminpanel/entreprise/cadres','CadreController');

Route::get('adminpanel/entreprise/cadres/{id}/delete','CadreController@delete');
Route::post('adminpanel/entreprise/cadres/changeimage','CadreController@changeimage');

Route::get('adminpanel/cadres','CadreController@home');/* for test button  datatable */

/*comites */
Route::get('/adminpanel/entreprise/comites/data','ComiteController@anyData')->name('adminpanel.comites.data');

	
Route::resource('/adminpanel/entreprise/comites','ComiteController');

Route::get('adminpanel/entreprise/comites/{id}/delete','ComiteController@delete');
Route::post('adminpanel/entreprise/comites/changeimage','ComiteController@changeimage');

/*slides */

	
Route::resource('/adminpanel/slides','SlideController');

Route::get('adminpanel/slides/{id}/delete','SlideController@delete');
Route::post('adminpanel/slides/changeimage','slideController@changeimage');


Route::get('users', function() {
    return view('admin.users.liste');
});



/*specialites */
Route::get('/adminpanel/specialites/data','SpecialiteController@anyData')->name('adminpanel.specialites.data');

Route::resource('/adminpanel/specialites','SpecialiteController');

Route::get('adminpanel/specialites/{id}/delete','SpecialiteController@delete');

/*sessions */
Route::get('/adminpanel/sessions/data','SesController@anyData')->name('adminpanel.sessions.data');

Route::resource('/adminpanel/sessions','SesController');

Route::get('adminpanel/sessions/{id}/delete','SesController@delete');



/*offres */
Route::get('/adminpanel/offres/data','OffreController@anyData')->name('adminpanel.offres.data');

Route::resource('/adminpanel/offres','OffreController');

Route::get('adminpanel/offres/{id}/delete','OffreController@delete');

/*inscriptions */
Route::get('/adminpanel/inscriptions/data','InscritController@anyData')->name('adminpanel.inscriptions.data');

Route::resource('/adminpanel/inscriptions','InscritController');


Route::get('adminpanel/inscriptions/{id}/delete','ActuelspecialController@delete');
Route::get('adminpanel/inscriptions/{id}/confirm','InscritController@confirminscrit');
Route::post('adminpanel/inscriptions/confirmation/{id}','InscritController@addnumins');

/*actuelspecialites */
Route::get('/adminpanel/actuelspecialites/data','ActuelspecialController@anyData')->name('adminpanel.actuelspecialites.data');

Route::resource('/adminpanel/actuelspecialites','ActuelspecialController');

Route::get('adminpanel/actuelspecialites/{id}/delete','ActuelspecialController@delete');
Route::post('adminpanel/actuelspecialites/changeimage','ActuelspecialController@changeimage');





/*modulesspecialites */
Route::get('/adminpanel/modulespecialites/data','ModulespecialController@anyData')->name('adminpanel.modulespecialites.data');

Route::resource('/adminpanel/modulespecialites','ModulespecialController');

Route::get('adminpanel/modulespecialites/{id}/delete','ModulespecialController@delete');


});

/*page panel professeur */

 Route::get('/adminpanel/{userid}/cours/data','CourController@anyData')->name('adminpanel.cours.data');

Route::resource('/adminpanel/{userid}/cours','CourController');

Route::get('adminpanel/{userid}/cours/{id}/delete','CourController@delete');
Route::get('adminpanel/cours/affichmod/{special}','CourController@affichemod');



/* resultat stagiares */
Route::get('adminpanel/resus/import','ResultatController@addimport');
Route::post('adminpanel/resus/saveimport','ResultatController@saveimport');

 Route::get('/adminpanel/results/data','ResultatController@anyData')->name('adminpanel.results.data');
Route::resource('/adminpanel/results','ResultatController');

Route::get('adminpanel/results/{id}/delete','ResultatController@delete');


/* documents */


 Route::get('/adminpanel/documents/data','DocumentController@anyData')->name('adminpanel.documents.data');
Route::resource('/adminpanel/documents','DocumentController');

Route::get('adminpanel/documents/{id}/delete','DocumentController@delete');

Route::post('adminpanel/documents/changeimage','DocumentController@changeimage');

});



Route::get('/', function () {
    return view('welcome');
}); 


/* realisation website */

Route::get('/realisations','RealisationController@liste');
Route::get('/realisations/{id}','RealisationController@show');

Route::post('realisations/add/comment/{id}','RealisationcommentController@addComment');

Route::get('realisations/delete/comment/{id}','RealisationcommentController@deleteComment');
Route::post('realisations/update/comment/{id}','RealisationcommentController@updateComment');



/* activites website */

Route::get('/activites','ActController@liste');
Route::get('/activites/{id}','ActController@show');
//Route::get('/activites/affiche/{id}','ActController@show');
Route::post('activites/add/comment/{id}','ActivitecommentController@addComment');

Route::get('activites/delete/comment/{id}','ActivitecommentController@deleteComment');
Route::post('activites/update/comment/{id}','ActivitecommentController@updateComment');

/* news website */

Route::get('/news','NewwController@liste');
Route::get('/news/{id}','NewwController@show');
//Route::get('/activites/affiche/{id}','ActController@show');
Route::post('news/add/comment/{id}','NewscommentController@addComment');

Route::get('news/delete/comment/{id}','NewscommentController@deleteComment');
Route::post('news/update/comment/{id}','NewscommentController@updateComment');


/*contact */
Route::get('/contact','ContactController@add');
Route::post('/contact','ContactController@store');

/*inscriptions */
Route::get('/inscriptions','InscritController@add');
Route::post('/inscriptions','InscritController@store')->name('inscrits.store');
Route::get('/inscriptions/{id}/edit','InscritController@modif');
Route::put('/inscriptions/{id}','InscritController@miseajour')->name('inscrits.update');
Route::get('/inscriptions/{id}/delete','InscritController@supprimer');
Route::get('/inscriptions/login','InscritController@connecter');
Route::post('/inscriptions/login','InscritController@checkinscrit');
Route::post('/inscriptions/changepassword','InscritController@changepassword');
/* reset password */
Route::get('inscrit_password/reset', 'InscritAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('inscrit_password/email', 'InscritAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('inscrit_password/reset/{token}', 'InscritAuth\ResetPasswordController@showResetForm');
Route::post('inscrit_password/reset', 'InscritAuth\ResetPasswordController@reset');
   
/* actualsepcs website */

Route::get('/actualspecialites','ActuelspecialController@liste');
Route::get('/actualspecialites/{id}','ActuelspecialController@show');


/* offres website */

Route::get('/offres','OffreController@liste');
Route::get('/offres/{id}','OffreController@show');

/* cadres website */

Route::get('/cadres','CadreController@liste');
Route::get('/cadres/{id}','CadreController@show');
Route::get('/entreprises/historique','CadreController@histo');
Route::get('/entreprises/motdirect','CadreController@motdirect');
Route::get('/entreprises/organ','CadreController@orga');


/* comites */
Route::get('/entreprises/comites','ComiteController@liste');
Route::get('/entreprises/comites/{id}','ComiteController@show');
/* cours prof  */
Route::get('/coursprof','CourController@liste');
Route::get('/coursprof/affiche/{spec}','CourController@affichemat');
Route::get('/coursprof/affiche/module/{mod}','CourController@affichemodule');

/* stagiares */
Route::get('/stagiaires/login','StagController@loginstagaffiche');
Route::post('/stagiaires/res','StagController@loginstag');
Route::get('/stagiaires/resaffiche','StagController@afficheres');


/* documents */
Route::get('/documents','DocumentController@liste');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/password/reset/{token}', ['uses'=> 'Auth\ResetPasswordController@showResetForm']);





