
  {{-- Componente alpine para o Timbre --}}
  <div class="md:w-4/6">
    <div class="" x-data="imageTimbre()">
      <div x-show="previewUrl == ''">
        <p class=" text-bold">
          <label for="thumbnailTimbre"
            class="cursor-pointer bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
            Inserir Imagem
          </label>
          @foreach ($tenant->images as $image)
            @if ($image->timbre != null)
              <input type="hidden" id="testeTimbre" value="{{ url("storage/{$image->timbre}") }}">
            @endif
          @endforeach
          <input type="file" name="timbre" id="thumbnailTimbre" class="hidden" @change="updatePreview()">
        </p>
      </div>
      <div x-show="previewUrl !== ''  ">
        <img :src="previewUrl" alt="" class="rounded w-28">
        <div class="">
          <button type="button" class="" @click="clearPreview()">Esvaziar</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Fim do componente alpine logo --}}
<script>
  function imageTimbre() {
    return {
      testeTimbre: document.getElementById("testeTimbre"),
      previewUrl: testeTimbre.value,
      updatePreview() {
        var reader,
          files = document.getElementById("thumbnailTimbre").files;

        reader = new FileReader();

        reader.onload = e => {
          this.previewUrl = e.target.result;
        };

        reader.readAsDataURL(files[0]);
      },
      clearPreview() {
        document.getElementById("thumbnailTimbre").value = null;
        this.previewUrl = "";
      }
    };
  }
</script>
