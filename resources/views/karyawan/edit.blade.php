<form action="/karyawan/{{ $karyawan->nik }}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
    @csrf
     <div class="row">
         <div class="col-12">
             <div class="input-icon mb-3">
                 <span class="input-icon-addon">
                   <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                     <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                     <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                     <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                     <path d="M5 11h1v2h-1z"></path>
                     <path d="M10 11l0 2"></path>
                     <path d="M14 11h1v2h-1z"></path>
                     <path d="M19 11l0 2"></path>
                  </svg>
                 </span>
                 <input type="text" readonly value="{{ $karyawan->nik }}" id="nik" class="form-control" name="nik" placeholder="NIK">
               </div>
         </div>
         </div>
         <div class="row">
             <div class="col-12">
                 <div class="input-icon mb-3">
                     <span class="input-icon-addon">
                       <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-abc" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <path d="M3 16v-6a2 2 0 1 1 4 0v6"></path>
                         <path d="M3 13h4"></path>
                         <path d="M10 8v6a2 2 0 1 0 4 0v-1a2 2 0 1 0 -4 0v1"></path>
                         <path d="M20.732 12a2 2 0 0 0 -3.732 1v1a2 2 0 0 0 3.726 1.01"></path>
                      </svg>
                     </span>
                     <input type="text" value="{{ $karyawan->nama_lengkap }}" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Pegawai">
                   </div>
             </div>
             </div>
             <div class="row">
                 <div class="col-12">
                     <div class="input-icon mb-3">
                         <span class="input-icon-addon">
                           <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-skyscraper" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                             <path d="M3 21l18 0"></path>
                             <path d="M5 21v-14l8 -4v18"></path>
                             <path d="M19 21v-10l-6 -4"></path>
                             <path d="M9 9l0 .01"></path>
                             <path d="M9 12l0 .01"></path>
                             <path d="M9 15l0 .01"></path>
                             <path d="M9 18l0 .01"></path>
                          </svg>
                         </span>
                         <input type="text" value="{{ $karyawan->jabatan }}" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan">
                       </div>
                 </div>
                 </div>
                 <div class="row">
                     <div class="col-12">
                         <div class="input-icon mb-3">
                             <span class="input-icon-addon">
                               <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                              </svg>
                             </span>
                             <input type="text" value="{{ $karyawan->no_hp }}" id="no_hp" class="form-control" name="no_hp" placeholder="Nomor Handphone">
                           </div>
                     </div>
     </div>
     <div class="row mt-2">
         <div class="col-12">
                 <input type="file" name="foto" class="form-control">
                 <input type="hidden" name="old_foto" value="{{ $karyawan->foto }}">
         </div>
     </div>
     <div class="row mt-2">
         <div class="col-12">
     <select name="kode_dept" id="kode_dept" class="form-select">
         <option value="">Departemen</option>
         @foreach ($departemen as $d)
             <option {{ $karyawan->kode_dept == $d->kode_dept ? 'selected' : ''}} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
         @endforeach
     </select>
         </div>
 </div>
 <div class="row mt-2">
     <div class="col-12">
         <div class="form-group">
             <button class="btn btn-primary w-100">
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                     <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                     <path d="M14 4l0 4l-6 0l0 -4"></path>
                  </svg>Simpan
             </button>
         </div>
     </div>
 </div>
 </form>
