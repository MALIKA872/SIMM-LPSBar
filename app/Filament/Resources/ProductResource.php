<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $pluralLabel = 'Products';
    protected static ?string $label = 'Product';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->label('Product Code')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('name')
                    ->label('Product Name')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->nullable(),
                Forms\Components\TextInput::make('minimum_stock')
                    ->label('Minimum Stock')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\TextInput::make('unit')
                    ->label('Unit')
                    ->required()
                    ->placeholder('e.g., pcs, box, etc'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->label('Code')->searchable()->sortable(),
                TextColumn::make('name')->label('Name')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                TextColumn::make('description')->label('Description')->limit(50),
                TextColumn::make('minimum_stock')->label('Min Stock')->sortable(),
                TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->prefix('Rp')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                BadgeColumn::make('unit')->label('Unit'),
                TextColumn::make('created_at')->label('Created At')->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
