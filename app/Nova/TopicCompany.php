<?php

namespace App\Nova;
 
use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\DateTime;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Laravel\Nova\Fields\Select;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\BelongsTo;

use Laravel\Nova\Fields\HasMany;

use App\Nova\Actions\EmailTopicGroup;
use App\Nova\Actions\TestAction;
use Sixlive\TextCopy\TextCopy;

use Outhebox\NovaHiddenField\HiddenField;

use OwenMelbz\RadioField\RadioButton;

use Spatie\TagsField\Tags;
use Waynestate\Nova\CKEditor; 
 
use Media24si\NovaYoutubeField\Youtube; 
//use Laravel\Nova\Fields\Image;
use Ctessier\NovaAdvancedImageField\AdvancedImage;

use Silvanite\NovaFieldCheckboxes\Checkboxes;

class TopicCompany extends Resource
{ 

    public static $group = 'Company';
    
    public static $model = 'App\TopicCompany';
 
    public static $title = 'topic_name';

    public static $search = [
        
        'user_id' ,'topic_name' , 'url' 
    ];

    public static function label() {

        return 'Topics';

    }
  
    public function fields(Request $request)
    {
        
        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;
        $loggedinpaid = Auth::user()->paid;
        $loggedinrole = Auth::user()->role;

        if( $loggedinrole == "super"){

            return [
                    ID::make()->sortable(), 

                    DateTime::make('Created at')->format('DD MMM YYYY, LT')->sortable()->hideFromDetail(),

                    Text::make('User', 'user_id')->sortable(),

                    Text::make('Topic Name')->sortable()->rules('required', 'max:100')
                            ->help(
                                'The heading of the review being asked for. Max length 100'
                            ),   

                    BelongsTo::make('Category')->rules('required', 'max:100'), 

                    CKEditor::make('Details')->options([
                        'height' => 300,
                        'toolbar' => [
                            ['Cut','Copy','Paste'],
                            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                            ['Image','Table','HorizontalRule','SpecialChar','PageBreak'], 
                            ['Bold','Italic','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                            ['JustifyLeft','JustifyCenter','JustifyRight'],
                            ['Link','Unlink'], 
                            ['Format','FontSize','-','Maximize']
                        ],
                    ])->hideFromIndex(),
   
                    AdvancedImage::make('Image')->disk('public')->croppable(1/1)->resize(600,600), 

                    Youtube::make('Video')->hideFromIndex()->hideFromDetail(),

                    RadioButton::make('Type')
                    ->options([ 
                        'Public' => 'Public',
                    ])->default('Public')->sortable()->help(
                                "<br><br><i>" . 'Sharable and option to display at askpls.com portal for others to view and review'  ."<i>"
                            )->hideFromIndex()->hideFromDetail(), 

                    RadioButton::make('Active', 'status')
                    ->options([ 
                        '0' => 'No',
                        '1' => 'Yes',
                    ])->sortable()->default('1'),

                    DateTime::make('Expiry Date', 'displayuptil')->format('DD MMM YYYY, LT')->sortable()->help(
                                "<i>" . 'By default, Topics will be active forever'  ."<i>"
                            )->hideFromIndex(), 

                    HiddenField::make( 'url')->default(mt_rand(100000000, 999999999))->hideFromIndex()->hideFromDetail()->hideWhenUpdating(),
          
                    TextCopy::make('Public URL' ,function(){

                        if ( $this->type == 'Public'){

                            return 'https://askpls.com/t/' . $this->url;
                        }

                    })->hideWhenUpdating(),

                    BelongsToMany::make('Group'),

                    HasMany::make('Review'),

                     
                ];

        }else{

            if( $loggedinpaid == 1){

                return [

                    ID::make()->sortable()->hideFromIndex(), 

                    RadioButton::make('Type')
                    ->options([ 
                        'Public' => 'Public',
                        'Private' => 'Private',
                    ])->default('Public')->sortable(), 

                    HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),

                    Text::make('Topic Name')->sortable()->rules('required', 'max:100')
                            ->help(
                                'The heading of the review being asked for. Max length 100'
                            )->hideWhenUpdating(), 

                    Text::make('Topic Name')->hideFromIndex()->onlyOnForms()->hideWhenCreating()->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]), 

                    BelongsTo::make('Category')->rules('required', 'max:100')->hideFromIndex(), 

                    CKEditor::make('Details')->options([
                        'height' => 300,
                        'toolbar' => [
                            ['Cut','Copy','Paste'],
                            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                            ['Image','Table','HorizontalRule','SpecialChar','PageBreak'], 
                            ['Bold','Italic','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                            ['JustifyLeft','JustifyCenter','JustifyRight'],
                            ['Link','Unlink'], 
                            ['Format','FontSize','-','Maximize']
                        ],
                    ])->hideFromIndex(),
     
                    AdvancedImage::make('Image')->disk('public')->croppable(1/1)->resize(600,600), 

                    Youtube::make('Video'), 

                    
                    RadioButton::make('Active', 'status')
                    ->options([ 
                        '0' => 'No',
                        '1' => 'Yes',
                    ])->sortable()->default('1'), 

                    HiddenField::make( 'url')->default(mt_rand(100000000, 999999999))->hideFromIndex()->hideFromDetail()->hideWhenUpdating(),
          
                    TextCopy::make('Public URL' ,function(){

                        if ( $this->type == 'Public'){

                            return 'https://askpls.com/t/' . $this->url;
                        }

                    })->hideWhenUpdating(), 

                    BelongsToMany::make('Group'),

                    HasMany::make('Review'),
                ];

            }else{

               return [

                    ID::make()->sortable()->hideFromIndex(), 

                    RadioButton::make('Type')
                    ->options([ 
                        'Public' => 'Public',
                    ])->default('Public')->sortable()->help(
                                "<br><br><i>" . 'Sharable and option to display at askpls.com portal for others to view and review'  ."<i>"
                            )->hideFromIndex(), 

                    HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),

                    Text::make('Topic Name')->sortable()->rules('required', 'max:100')
                            ->help(
                                'The heading of the review being asked for. Max length 100'
                            )->hideWhenUpdating(), 

                    Text::make('Topic Name')->hideFromIndex()->onlyOnForms()->hideWhenCreating()->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]), 

                    BelongsTo::make('Category')->rules('required', 'max:100')->hideFromIndex(), 

                    CKEditor::make('Details')->options([
                        'height' => 300,
                        'toolbar' => [
                            ['Cut','Copy','Paste'],
                            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                            ['Image','Table','HorizontalRule','SpecialChar','PageBreak'], 
                            ['Bold','Italic','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                            ['JustifyLeft','JustifyCenter','JustifyRight'],
                            ['Link','Unlink'], 
                            ['Format','FontSize','-','Maximize']
                        ],
                    ])->hideFromIndex(),
      
                    AdvancedImage::make('Image')->disk('public')->croppable(1/1)->resize(600,600),

                    Youtube::make('Video'), 
 
                    HiddenField::make( 'url')->default(mt_rand(100000000, 999999999))->hideFromIndex()->hideFromDetail()->hideWhenUpdating(),
          
                    TextCopy::make('Public URL' ,function(){

                        if ( $this->type == 'Public'){

                            return 'https://askpls.com/t/' . $this->url;
                        }

                    })->hideWhenUpdating(), 

                    HasMany::make('Review'),
                ];

            }
 
            
 
        }
      
    }

 
    public function cards(Request $request)
    {
        return [];
    }

 
    public function filters(Request $request)
    {
        return [];
    }

 
    public function lenses(Request $request)
    {
        return [];
    }

 
    public function actions(Request $request)
    {
          
        $loggedinpaid = Auth::user()->paid;
        $loggedinrole = Auth::user()->role;
        $loggedintopicable_type = Auth::user()->topicable_type;

        if( $loggedinrole == 'super'){

            return [

                new EmailTopicGroup, 
            ];

        }elseif( $loggedinpaid == 1 && $loggedintopicable_type == 'App\Company'){

            return [

                new EmailTopicGroup, 
            ];

        }else{

            return [
 
            ];

        } 


        
    }
}
