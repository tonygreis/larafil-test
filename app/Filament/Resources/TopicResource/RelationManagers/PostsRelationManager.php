<?php

namespace App\Filament\Resources\TopicResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('title')
                        ->reactive()
                        ->afterStateUpdated(function (Closure $set, $state) {
                            $set('slug', Str::slug($state));
                            $set('meta.url', url(Str::slug($state)));
                            $set('meta.title', $state);
                        }),
                    TextInput::make('slug'),
                    TextInput::make('github_repo'),
                    RichEditor::make('description'),
                    SpatieMediaLibraryFileUpload::make('thumbnail')->collection('posts'),
                    Toggle::make('is_published'),
                    MultiSelect::make('tags')
                        ->relationship('tags', 'name'),
                ])->columns(1),
                Card::make()->schema([
                    Fieldset::make('Meta')
                        ->relationship('meta')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('url'),
                            Textarea::make('description'),
                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
