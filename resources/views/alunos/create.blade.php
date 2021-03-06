@extends('layouts.aluno')

@section('content')

  <div class="grid grid-flow-row auto-rows-max md:auto-rows-min mx-8">
    <h3 class="p-3	">Area de Cadastro de Aluno(a)</h3>

    <form action="{{ route('aluno.store') }}" method="post" class="">
      @csrf
      <!-- <div class="row">
                                                                                        <div class="form-group col-sm-12">
                                                                                            <label for="" class="col-sm-2 control-label">Nome do Aluno(a)</label>
                                                                                            <div class="col-sm-4">
                                                                                                <input type="text" name="NOME" id="" class="form-control" placeholder="" required>
                                                                                            </div>
                                                                                            <label for="" class="col-sm-2 control-label">Nascimento</label>
                                                                                        <div class="col-sm-4">
                                                                                                <input type="date" name="NASCIMENTO" id="" class=" form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->
      <div class="row justify-content-center">
        <fieldset class="col-sm-12 col-md-12 px-6">
          <legend>Dados Pessoais:</legend>
          <!-- <div class="row ">
                                                                                    <div class="form-group col-sm-9 col-lg-6">
                                                                                        <label class="pt-2 col-sm-1" for="">Nome:</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" name="NOME" id="" class="form-control" placeholder="Nome do Aluno(a)" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-sm-9 col-lg-6">
                                                                                        <label class="pt-2 " for="cost">NASCIMENTO:</label>
                                                                                        <div class="input-group">
                                                                                            <input type="date" name="NASCIMENTO" id="" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
          <div class="row">
            <label for="" class="col-sm-1 col-form-label">NOME:</label>
            <div class="col-sm-6">
              <input type="text" name="NOME" id="" class="form-control" placeholder="Nome do Aluno(a)" required>
            </div>
            <label for="" class="col-sm-2 col-form-label">NASCIMENTO:</label>
            <div class="col-sm-3">
              <input type="date" name="NASCIMENTO" id="" class="form-control">
            </div>
          </div><br>
          <div class="row">
            <label for="" class="col-sm-2 col-form-label">CERTID??O CIVIL:</label>
            <div class="col-sm-4">
              <select name="CERTIDAO_CIVIL" id="" class="form-control">
                <option value="NASCIMENTO" selected>NASCIMENTO</option>
                <option value="CASAMENTO">CASAMENTO</option>
              </select>
            </div>
            <label for="" class="col-sm-2 col-form-label">Matricula da Certid??o:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="MATRICULA_CERTIDAO" placeholder="XXXXXXXXXX  XXXX  X  XXXXX  XXX  XXXXXXX  XX">
            </div>
          </div>
          <br>
          <div class="row">
            <label for="" class="col-sm-2  control-label">Modelo da Certid??o:</label>
            <div class="col-sm-4">
              <select class="form-control" name="MODELO_CERTIDAO" id="">
                <option value="NOVO">NOVO</option>
                <option value="VELHO">VELHO</option>
              </select>
            </div>
            <label for="" class="col-sm-2 control-label">Dados da Certid??o:</label>
            <div class="col-sm-4" id="">
              <input type="text" class="form-control" id="" name="DADOS_CERTIDAO" placeholder="Termo N?? XXX,  FLS: xxx,  Livro: xx.">
            </div>
          </div>
          <br>
          <div class="row">
            <label for="" class="col-sm-2 control-label">Expedi????o:</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="" name="EXPEDICAO_CERTIDAO">
            </div>
            <label for="" class="col-sm-2 control-label">Cor/Ra??a:</label>
            <div class="col-sm-4">             
              <select class="form-control" name="COR" id="">
                <option value="6">Cor declarada pelo Aluno(a)</option>
                @foreach ($colors as $color)
                  <option value="{{ $color->id }}">{{ $color->NOME }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </fieldset>
      </div><br>
      <!-- DAdos de Identifica????o -->
      <div class="row justify-content-center">
        <fieldset class="col-sm-12 col-md-12 px-6">
          <legend>Dados de Identifica????o:</legend>
          <div class="row">
            <label for="" class="col-sm-2 control-label">Nis:</label>
            <div class="col-sm-4">
              <input class="form-control" type="text" id="NIS" name="NIS" placeholder="">
            </div>
            <label for="" class="col-sm-2 control-label ">Bolsa Fam??lia:</label>
            <div class="col-sm-4">
              <select class="form-control" name="BOLSA_FAMILIA" id="">
                <option value="NAO" selected>N??O</option>
                <option>SIM</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <label for="SUS" class="col-sm-2 control-label">SUS:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="SUS" name="SUS">
            </div>
            <label for="CPF" class="col-sm-2 control-label">CPF:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="CPF" name="CPF">
            </div>
          </div>
          <br>
          <div class="row">
            <label for="RG" class="col-sm-1 control-label">RG:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="" name="NUMERO_RG" placeholder="N?? do RG">
            </div>
            <label for="" class="col-sm-2 control-label">Org??o Expedidor:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="" name="ORGAO_EXPEDIDOR_RG">
            </div>
            <label for="" class="col-sm-2 control-label">Expedi????o:</label>
            <div class="col-sm-2">
              <input type="date" class="form-control" id="" name="EXPEDICAO_RG">
            </div>
          </div>
        </fieldset>
      </div>
      <br>
      <!-- Parentesco  -->
      <div class="row justify-content-center">
        <fieldset class="col-sm-12 col-md-12 px-6">
          <legend>Parentesco:</legend>
          {{-- Carrega estado/cidades em Alpine --}}
          <div x-data="app()" x-init="init()">
            <div class="row">
              <label for="" class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-4">
                {{-- Api do IBGE --}}
                <div x-show="isLoading">Loading . . . .</div>
                <select name="ESTADO" id="" class="form-control" @change="getCities()" x-model="stateSelected">
                  <option value="" selected disabled>Escolha o Estado</option>
                  <template x-for="state in states" :key="state.id">
                    <option x-bind:value="state.id" x-bind:selected="state.id == 26" x-text="state.nome"></option>
                  </template>
                </select>
              </div>
              <label for="" class="col-sm-2 control-label ">Naturalidade</label>
              <div class="col-sm-4">
                <div x-show="isLoadingCities">Loading . . . .</div>
                <select name="NATURALIDADE" id="" class="form-control" x-ref="cities">
                  <template x-for="city in cities" :key="city.id">
                    <option x-bind:value="city.id" x-text="city.nome"></option>
                  </template>
                </select>
              </div>
            </div>
          </div>
          {{-- Fim do Alpine --}}
          <br>
          <div class="row">
            <label for="" class="col-sm-2 control-label">Nacionalidade</label>
            <div class="col-sm-4">
              <select name="NACIONALIDADE" id="" class="form-control">
                @foreach ($countries as $country)
                  @if ($country->id == 31)
                    <option value="{{ $country->id }}" selected>{{ $country->nome }}</option>
                  @else
                    <option value="{{ $country->id }}">{{ $country->nome }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <label for="inputSexo" class="col-sm-2  control-label">Sexo</label>
            <div class="col-sm-4">
              <select class="form-control" name="SEXO" id="" required>
                <option value="---------" selected>Marque uma Op????o</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMININO">FEMININO</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <label for="" class="col-sm-2 control-label">Nome do Pai</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" name="PAI" onkeyup="maiuscula(this)">
            </div>
            <label for="" class="col-sm-2 control-label">Profiss??o do Pai</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" name="PROF_PAI" onkeyup="maiuscula(this)">
            </div>
          </div>
          <br>
          <div class="row">
            <label for="" class="col-sm-2 control-label">Nome da M??e</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" name="MAE" onkeyup="maiuscula(this)">
            </div>
            <label for="" class="col-sm-2 control-label">Profiss??o da M??e</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" name="PROF_MAE" onkeyup="maiuscula(this)">
            </div>
          </div>
        </fieldset>
      </div>
      <br>
      <!-- Localiza????o  -->
      <div class="row justify-content-center">
        <fieldset class="col-sm-12 col-md-12 px-6">
          <legend>Localiza????o:</legend>
          <div class="row">
            <label for="" class="col-sm-2 control-label">Endere??o:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" name="ENDERECO" onkeyup="maiuscula(this)" placeholder="Nome da Rua/S??tio ou Afins">
            </div>
            <label for="" class="col-sm-2 control-label">Fones:</label>
            <div class="col-sm-2">
              <input id="FONE" type="text" class="form-control" name="FONE" placeholder="XX-XXXXX-XXXX">
            </div>
            <div class="col-sm-2">
              <input id="FONE_II" type="text" class="form-control" name="FONE_II" placeholder="XX-XXXXX-XXXX">
            </div>
          </div>
          <br>
          {{-- Carrega estado/cidades em Alpine --}}
          <div x-data="app()" x-init="init()">
            <div class="row">
              <label for="" class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-4">
                {{-- Api do IBGE --}}
                <div x-show="isLoading">Loading . . . .</div>
                <select name="CIDADE_ESTADO" id="" class="form-control" @change="getCities()" x-model="stateSelected">
                  <option value="" selected disabled>Escolha o Estado</option>
                  <template x-for="state in states" :key="state.id">
                    <option x-bind:value="state.id" x-bind:selected="state.id == 26" x-text="state.nome"></option>
                  </template>
                </select>
              </div>
              <label for="" class="col-sm-2 control-label">Cidade</label>
              <div class="col-sm-4">
                <div x-show="isLoadingCities">Loading . . . .</div>
                <select name="CIDADE" id="" class="form-control" x-ref="cities">
                  <template x-for="city in cities" :key="city.id">
                    <option x-bind:value="city.id" x-text="city.nome"></option>
                  </template>
                </select>
              </div>
            </div>
          </div>
          {{-- Fim do Alpine --}}
          <br>
          <div class="row">
            <label for="" class="col-sm-2 control-label">Transporte</label>
            <div class="col-sm-4">
              <select class="form-control" name="TRANSPORTE" id="inputTransporte">
                <option value="N??O">---</option>
                <option>SIM</option>
                <option value="NAO">N??O</option>
              </select>
            </div>
            <label for="" class="col-sm-2 control-label">Urbano/Rural</label>
            <div class="col-sm-4">
              <select class="form-control" name="URBANO" id="">
                <option checked value="SIM">Urbano</option>
                <option value="NAO">Rural</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row" id="motoristas">
            <label for="" class="col-sm-2  control-label">Motorista</label>
            <div class="col-sm-4">
              <select class="form-control" name="MOTORISTA" id="inputMotorista">
              </select>
            </div>
            <label for="" class="col-sm-2 control-label">Motorista II</label>
            <div class="col-sm-4">
              <select class="form-control" name="MOTORISTA_II" id="inputMotorista2">
              </select>
            </div>
          </div>
        </fieldset>
      </div>
      <br>
      <!-- S??ude  -->
      <div class="row justify-content-center">
        <fieldset class="col-sm-12 col-md-12 px-6">
          <legend>S??ude:</legend>
          <div class="row">
            <label for="inputNecessidades" class="col-sm-2 control-label">Necessidasdes Especiais:</label>
            <div class="col-sm-4">
              <select class="form-control" id="" name="NECESSIDADES_ESPECIAIS">
                <option value="NAO">N??O</option>
                <option value="SIM">SIM</option>
              </select>
            </div>
            <label for="" class="col-sm-2 control-label">Cod. da Necessidade:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="NECESSIDADES_ESPECIAIS_CODIGO" placeholder="C??digo da Doen??a">
            </div>
          </div>
          <br>
          <div class="row">
            <label for="" class="col-sm-2 control-label">Descri????o da Necessidade:</label>
            <div class="col-sm-12">
              <textarea class="form-control" rows="2" id="" name="NECESSIDADES_ESPECIAIS_DESCRICACAO"
                placeholder="Livre para Registro de quaisquer observa????es"></textarea>
            </div>
          </div>
        </fieldset>
      </div>
      <br>
      <!-- Observa????es  -->
      <div class="row justify-content-center">
        <fieldset class="col-sm-12 col-md-12 px-6">
          <legend>Observa????es:</legend>
          <div class="row">
            <div class="col-sm-12">
              <textarea class="form-control" rows="4" id="" name="OBSERVACOES"
                placeholder="Livre para Registro de quaisquer observa????es a respeito do aluno(a)"></textarea>
            </div>
          </div>
        </fieldset>
      </div>
      {{-- Bot??es --}}
      <div class="row">
        <div class="col-sm-12 ">
          <label for="" class="col-sm-2 control-label"></label>
          <div class="col-sm-12">
            <button type="submit" class="btn btn-outline-success btn-block " onclick="return confirmar()"><B>Salvar</B></button>
          </div>
        </div>
      </div>
      <div style="margin-bottom: 60px;">
        <input type="hidden" id="usuario" value="{{ Auth::user()->name }}">
      </div>
    </form>
  </div>

  <script>
    function app() {
      return {
        states: [],
        cities: [],
        stateSelected: null,
        idState: null,
        isLoading: true,
        isLoadingCities: false,
        init() {
          this.getStates();
          this.getCity();
        },

        getStates() {
          fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados/')
            .then(res => res.json())
            .then(res => {
              this.isLoading = false
              this.states = res
            })
        },
        getCity() {
          this.isLoadingCities = true,
            fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados/26/municipios/')
            .then(res => res.json())
            .then(res => {
              this.$refs.cities.prepend(new Option("Escolha uma cidade"))
              this.isLoadingCities = false
              this.cities = res
            })
        },
        getCities() {
          this.$refs.cities.length = 0,
            this.isLoadingCities = true,
            fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + this.stateSelected + '/municipios/')
            .then(res => res.json())
            .then(res => {
              this.$refs.cities.prepend(new Option("Escolha uma cidade"))
              this.isLoadingCities = false
              this.cities = res
            })
        },

      }

    }
  </script>

@stop
