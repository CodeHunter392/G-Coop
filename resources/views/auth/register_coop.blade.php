@extends('layoutsWelcome.master')
@section('titre', 'Inscrivez vous !')
@section('content')
<section class="vh-100"style="background-image: url('{{ asset('images/register-img2.jpg') }}'); background-size: cover; background-position: center;">
{{-- style="background-color: #9A616D;"> --}}
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10 ">
          <div class="card " style="border-radius: 1rem;">
            <div class="card-body p-4 text-black">

              <h3 class="mb-3">Informations sur la coopérative</h3>

              <form>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="coopName" class="form-label">Nom de la coopérative *</label>
                    <input type="text" id="coopName" class="form-control" />
                  </div>
                  <div class="col-md-6">
                    <label for="type" class="form-label">Type *</label>
                    <select id="type" class="form-select">
                      <option selected>Choisir un type</option>
                      <option value="1">Type 1</option>
                      <option value="2">Type 2</option>
                    </select>
                  </div>
                </div>



                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="members" class="form-label">Nombre d'adhérents *</label>
                    <input type="number" id="members" class="form-control" />
                  </div>
                  <div class="col-md-6">
                    <label for="sector" class="form-label">Secteur *</label>
                    <select id="sector" class="form-select">
                      <option selected>Choisir un secteur</option>
                      <option value="1">Secteur 1</option>
                      <option value="2">Secteur 2</option>
                    </select>
                  </div>
                </div>
                 <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="startDate" class="form-label">Date de création *</label>
                    <input type="date" id="startDate" class="form-control" />
                  </div>
                  <div class="col-md-6">
                    <label for="endDate" class="form-label">Date de fin d'activité *</label>
                    <input type="date" id="endDate" class="form-control" />
                  </div>

                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="address" class="form-label">Adresse de la coopérative *</label>
                    <input type="text" id="address" class="form-control" />
                  </div>
                  <div class="col-md-6">
                    <label for="locality" class="form-label">Localité *</label>
                    <select id="locality" class="form-select">
                      <option selected>Choisir une localité</option>
                      <option value="1">Localité 1</option>
                      <option value="2">Localité 2</option>
                    </select>
                  </div>
                </div>

                <h3 class="mb-3">Informations sur le bureau de la coopérative</h3>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="mandateStart" class="form-label">Date du mandat *</label>
                    <input type="date" id="mandateStart" class="form-control" />
                  </div>
                  <div class="col-md-6">
                    <label for="mandateEnd" class="form-label">Date de fin *</label>
                    <input type="date" id="mandateEnd" class="form-control" />
                  </div>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-success btn-lg btn-block">Enregistrer</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
