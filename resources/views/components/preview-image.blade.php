{{-- Componente alpine para o logo --}}
<div class="md:w-4/6">
  <div class="" x-data="imageData()">
    <div x-show="previewUrl == ''">
      <p class=" text-bold">
        <label for="thumbnail"
          class="cursor-pointer bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
          Inserir Imagem
        </label>
        @foreach ($tenant->images as $image)
          @if ($image->logo != null)
            <input type="hidden" id="testeLogo" value="{{ url("storage/{$image->logo}") }}">
          @endif
        @endforeach
        <input type="file" name="logo" id="thumbnail" class="hidden" @change="updatePreview()">
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
  function imageData() {
    return {
      testeLogo: document.getElementById("testeLogo"),
      previewUrl: testeLogo.value,
      reader: null,
      updatePreview() {
        this.reader,
          files = document.getElementById("thumbnail").files;

        this.reader = new FileReader();

        this.reader.onload = e => {
          this.previewUrl = e.target.result;
        };

        this.reader.readAsDataURL(files[0]);
      },
      clearPreview() {
        document.getElementById("thumbnail").value = null;
        this.previewUrl = "";
      }
    };
  }
</script>
