<div class="container mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Daftar Performance</h1>
  <a href="{{route ('performance.create')}}">tambah data</a>
  
  <table class="min-w-full border border-gray-200 rounded-lg shadow-md">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-4 py-2 text-left">id</th>
        <th class="px-4 py-2 text-left">title</th>
        <th class="px-4 py-2 text-left">category</th>
        <th class="px-4 py-2 text-left">deskription</th>
        <th class="px-4 py-2 text-left">year</th>
        <th class="px-4 py-2 text-left">image</th>
      </tr>
    </thead>
    <tbody>
      <!-- Contoh data -->
       @forelse($performance as $data)
      <tr class="border-t">
        <td class="px-4 py-2">{{$data->id}}</td>
        <td class="px-4 py-2 font-semibold">{{$data->title}}</td>
        <td class="px-4 py-2">{{$data->category}}</td>
        <td class="px-4 py-2">{{$data->description}}</td>
        <td class="px-4 py-2">{{$data->year}}</td>
        <td class="px-4 py-2">
          <img src="https://via.placeholder.com/100" alt="gambar" class="w-24 h-16 object-cover rounded-md">
        </td>

</tr>
@empty
<tr>
    <td colspan='6' style="text-align : center">data masih kosong
        
</td>
</tr>
@endforelse
    </tbody>
  </table>
</div>
