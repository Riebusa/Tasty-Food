<?php

namespace App\Filament\Pages;

use App\Models\Pengaturan;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

/**
 * @property-read Schema $form
 */
class PengaturanSitus extends Page
{
    protected string $view = 'filament.pages.pengaturan-situs';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static ?string $title = 'Pengaturan Website';

    protected static ?int $navigationSort = 5;

    /** @var array<string, mixed>|null */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Pengaturan::pluck('value', 'key')->all());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Tabs::make('Pengaturan')
                        ->tabs([
                            Tab::make('Home')->schema([
                                TextInput::make('home_hero_judul_kecil')->label('Judul kecil hero')->maxLength(100),
                                TextInput::make('home_hero_judul_besar')->label('Judul besar hero')->maxLength(100),
                                Textarea::make('home_hero_teks')->label('Teks hero')->rows(4)->columnSpanFull(),
                                self::gambar('home_hero_gambar', 'Piring besar di hero (PNG transparan disarankan)', resize: false),
                                Textarea::make('home_tentang_teks')->label('Teks "Tentang Kami" di Home')->rows(4)->columnSpanFull(),
                            ])->columns(2),

                            Tab::make('Tentang')->schema([
                                TextInput::make('tentang_judul')->label('Judul bagian Tasty Food')->maxLength(100)->columnSpanFull(),
                                Textarea::make('tentang_teks_tebal')->label('Paragraf pertama (tebal)')->rows(4)->columnSpanFull(),
                                Textarea::make('tentang_teks')->label('Paragraf kedua')->rows(4)->columnSpanFull(),
                                self::gambar('tentang_gambar_1', 'Gambar Tasty Food (kiri)'),
                                self::gambar('tentang_gambar_2', 'Gambar Tasty Food (kanan)'),
                                Textarea::make('tentang_visi')->label('Visi')->rows(8)->columnSpanFull(),
                                self::gambar('tentang_visi_gambar_1', 'Gambar Visi (kiri)'),
                                self::gambar('tentang_visi_gambar_2', 'Gambar Visi (kanan)'),
                                Textarea::make('tentang_misi')->label('Misi')->rows(8)->columnSpanFull(),
                                self::gambar('tentang_misi_gambar', 'Gambar Misi'),
                            ])->columns(2),

                            Tab::make('Kontak & Footer')->schema([
                                Textarea::make('footer_deskripsi')->label('Deskripsi di footer')->rows(4)->columnSpanFull(),
                                TextInput::make('kontak_email')->label('Email')->email()->maxLength(150),
                                TextInput::make('kontak_telepon')->label('Telepon')->maxLength(50),
                                TextInput::make('kontak_alamat')->label('Alamat')->maxLength(255)->columnSpanFull(),
                                TextInput::make('sosmed_facebook')->label('Link Facebook')->maxLength(255),
                                TextInput::make('sosmed_twitter')->label('Link Twitter')->maxLength(255),
                                TextInput::make('kontak_maps_embed')
                                    ->label('URL embed Google Maps')
                                    ->helperText('Di Google Maps: Bagikan → Sematkan peta → salin isi atribut src="..." dari kode iframe (hanya URL-nya).')
                                    ->url()
                                    ->regex('/^https:\/\/www\.google\.com\/maps\/embed/')
                                    ->validationMessages(['regex' => 'URL harus diawali https://www.google.com/maps/embed'])
                                    ->columnSpanFull(),
                            ])->columns(2),

                            Tab::make('Tampilan')->schema([
                                self::gambar('hero_bg', 'Foto latar header (landscape, ±1920×700 px)')
                                    ->helperText('Dipakai di header semua halaman dalam dan latar kartu fitur di Home. Kosongkan untuk memakai foto bawaan.'),
                            ]),
                        ])
                        ->columnSpanFull(),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->label('Simpan')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Pengaturan::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Notification::make()
            ->success()
            ->title('Pengaturan disimpan')
            ->send();
    }

    private static function gambar(string $key, string $label, bool $resize = true): FileUpload
    {
        $field = FileUpload::make($key)
            ->label($label)
            ->image()
            ->disk('public')
            ->directory('pengaturan')
            ->visibility('public')
            ->maxSize(5120)
            ->imageEditor();

        if ($resize) {
            $field
                ->automaticallyResizeImagesMode('contain')
                ->automaticallyResizeImagesToWidth('1920')
                ->automaticallyResizeImagesToHeight('1920');
        }

        return $field;
    }
}