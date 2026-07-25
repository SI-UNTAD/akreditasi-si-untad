{{-- resources/views/components/home/vision-mission.blade.php --}}

@props(['id' => 'visi-misi'])

<section id="{{ $id }}" class="py-[120px] bg-[#181818] px-16">
    <div class="max-w-[1280px] mx-auto">
        <h2 class="text-[32px] font-bold text-white mb-16 text-center">Visi & Misi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-[#1f1f1f] p-10 rounded-2xl">
                <h3 class="text-[24px] font-bold text-white mb-4">Visi</h3>
                <p class="text-[#b3b3b3]">Menjadi pusat unggulan pendidikan Sistem Informasi berbasis kearifan lokal yang kompetitif di tingkat internasional pada tahun 2030.</p>
            </div>
            <div class="bg-[#1f1f1f] p-10 rounded-2xl">
                <h3 class="text-[24px] font-bold text-white mb-4">Misi</h3>
                <ul class="text-[#b3b3b3] space-y-2 list-disc pl-5">
                    <li>Pendidikan berkualitas.</li>
                    <li>Riset inovatif Data Science & AI.</li>
                    <li>Pengabdian masyarakat.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
