<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */


    include_once dirname(__FILE__) . '/' . 'components/utils/check_utils.php';
    CheckPHPVersion();
    CheckTemplatesCacheFolderIsExistsAndWritable();


    include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page.php';


    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthorizationStrategy()->ApplyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    // OnBeforePageExecute event handler
    
    
    
    class policyPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`policy`');
            $field = new IntegerField('Policy_No', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Item_Type_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('User_Type_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('State_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Fine_Per_Day');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('Duration');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Fine_Per_Day_After_Duration');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('Item_Type_ID', 'item_type', new IntegerField('Item_Type_ID', null, null, true), new StringField('Item_Type_Name', 'Item_Type_ID_Item_Type_Name', 'Item_Type_ID_Item_Type_Name_item_type'), 'Item_Type_ID_Item_Type_Name_item_type');
            $this->dataset->AddLookupField('User_Type_ID', 'user_type', new IntegerField('User_Type_ID', null, null, true), new StringField('User_Type_Name', 'User_Type_ID_User_Type_Name', 'User_Type_ID_User_Type_Name_user_type'), 'User_Type_ID_User_Type_Name_user_type');
            $this->dataset->AddLookupField('State_ID', 'state', new IntegerField('State_ID', null, null, true), new StringField('PR/Lending', 'State_ID_PR/Lending', 'State_ID_PR/Lending_state'), 'State_ID_PR/Lending_state');
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        public function GetPageList()
        {
            $currentPageCaption = $this->GetShortCaption();
            $result = new PageList($this);
            if (GetCurrentUserGrantForDataSource('author')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Author'), 'author.php', $this->RenderText('Author'), $currentPageCaption == $this->RenderText('Author')));
            if (GetCurrentUserGrantForDataSource('books')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Books'), 'books.php', $this->RenderText('Books'), $currentPageCaption == $this->RenderText('Books')));
            if (GetCurrentUserGrantForDataSource('borrow')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Borrow'), 'borrow.php', $this->RenderText('Borrow'), $currentPageCaption == $this->RenderText('Borrow')));
            if (GetCurrentUserGrantForDataSource('cd/dvd')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Cd/dvd'), 'cd_dvd.php', $this->RenderText('Cd/dvd'), $currentPageCaption == $this->RenderText('Cd/dvd')));
            if (GetCurrentUserGrantForDataSource('copy')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Copy'), 'copy.php', $this->RenderText('Copy'), $currentPageCaption == $this->RenderText('Copy')));
            if (GetCurrentUserGrantForDataSource('item')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Item'), 'item.php', $this->RenderText('Item'), $currentPageCaption == $this->RenderText('Item')));
            if (GetCurrentUserGrantForDataSource('item_type')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Item Type'), 'item_type.php', $this->RenderText('Item Type'), $currentPageCaption == $this->RenderText('Item Type')));
            if (GetCurrentUserGrantForDataSource('librarian')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Librarian'), 'librarian.php', $this->RenderText('Librarian'), $currentPageCaption == $this->RenderText('Librarian')));
            if (GetCurrentUserGrantForDataSource('policy')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Policy'), 'policy.php', $this->RenderText('Policy'), $currentPageCaption == $this->RenderText('Policy')));
            if (GetCurrentUserGrantForDataSource('reservation')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Reservation'), 'reservation.php', $this->RenderText('Reservation'), $currentPageCaption == $this->RenderText('Reservation')));
            if (GetCurrentUserGrantForDataSource('serial')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Serial'), 'serial.php', $this->RenderText('Serial'), $currentPageCaption == $this->RenderText('Serial')));
            if (GetCurrentUserGrantForDataSource('state')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('State'), 'state.php', $this->RenderText('State'), $currentPageCaption == $this->RenderText('State')));
            if (GetCurrentUserGrantForDataSource('student')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Student'), 'student.php', $this->RenderText('Student'), $currentPageCaption == $this->RenderText('Student')));
            if (GetCurrentUserGrantForDataSource('teacher')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Teacher'), 'teacher.php', $this->RenderText('Teacher'), $currentPageCaption == $this->RenderText('Teacher')));
            if (GetCurrentUserGrantForDataSource('user')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('User'), 'user.php', $this->RenderText('User'), $currentPageCaption == $this->RenderText('User')));
            if (GetCurrentUserGrantForDataSource('user_type')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('User Type'), 'user_type.php', $this->RenderText('User Type'), $currentPageCaption == $this->RenderText('User Type')));
            if (GetCurrentUserGrantForDataSource('fine')->HasViewGrant())
                $result->AddPage(new PageLink($this->RenderText('Fine'), 'fine.php', $this->RenderText('Fine'), $currentPageCaption == $this->RenderText('Fine')));
            
            if ( HasAdminPage() && GetApplication()->HasAdminGrantForCurrentUser() )
              $result->AddPage(new PageLink($this->GetLocalizerCaptions()->GetMessageString('AdminPage'), 'phpgen_admin.php', $this->GetLocalizerCaptions()->GetMessageString('AdminPage'), false, true));
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function CreateGridSearchControl(Grid $grid)
        {
            $grid->UseFilter = true;
            $grid->SearchControl = new SimpleSearch('policyssearch', $this->dataset,
                array('Policy_No', 'Item_Type_ID_Item_Type_Name', 'User_Type_ID_User_Type_Name', 'State_ID_PR/Lending', 'Fine_Per_Day', 'Duration', 'Fine_Per_Day_After_Duration'),
                array($this->RenderText('Policy No'), $this->RenderText('Item Type ID'), $this->RenderText('User Type ID'), $this->RenderText('State ID'), $this->RenderText('Fine Per Day'), $this->RenderText('Duration'), $this->RenderText('Fine Per Day After Duration')),
                array(
                    '=' => $this->GetLocalizerCaptions()->GetMessageString('equals'),
                    '<>' => $this->GetLocalizerCaptions()->GetMessageString('doesNotEquals'),
                    '<' => $this->GetLocalizerCaptions()->GetMessageString('isLessThan'),
                    '<=' => $this->GetLocalizerCaptions()->GetMessageString('isLessThanOrEqualsTo'),
                    '>' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThan'),
                    '>=' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThanOrEqualsTo'),
                    'ILIKE' => $this->GetLocalizerCaptions()->GetMessageString('Like'),
                    'STARTS' => $this->GetLocalizerCaptions()->GetMessageString('StartsWith'),
                    'ENDS' => $this->GetLocalizerCaptions()->GetMessageString('EndsWith'),
                    'CONTAINS' => $this->GetLocalizerCaptions()->GetMessageString('Contains')
                    ), $this->GetLocalizerCaptions(), $this, 'CONTAINS'
                );
        }
    
        protected function CreateGridAdvancedSearchControl(Grid $grid)
        {
            $this->AdvancedSearchControl = new AdvancedSearchControl('policyasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Policy_No', $this->RenderText('Policy No')));
            
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`item_type`');
            $field = new IntegerField('Item_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Item_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Item_Type_ID', $this->RenderText('Item Type ID'), $lookupDataset, 'Item_Type_ID', 'Item_Type_Name', false));
            
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`user_type`');
            $field = new IntegerField('User_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('User_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('User_Type_ID', $this->RenderText('User Type ID'), $lookupDataset, 'User_Type_ID', 'User_Type_Name', false));
            
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`state`');
            $field = new IntegerField('State_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('PR/Lending');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('State_ID', $this->RenderText('State ID'), $lookupDataset, 'State_ID', 'PR/Lending', false));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Fine_Per_Day', $this->RenderText('Fine Per Day')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Duration', $this->RenderText('Duration')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Fine_Per_Day_After_Duration', $this->RenderText('Fine Per Day After Duration')));
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actionsBandName = 'actions';
            $grid->AddBandToBegin($actionsBandName, $this->GetLocalizerCaptions()->GetMessageString('Actions'), true);
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
                $column->OnShow->AddListener('ShowDeleteButtonHandler', $this);
            $column->SetAdditionalAttribute("data-modal-delete", "true");
            $column->SetAdditionalAttribute("data-delete-handler-name", $this->GetModalGridDeleteHandler());
            }
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $column = new RowOperationByLinkColumn($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset);
                $grid->AddViewColumn($column, $actionsBandName);
            }
        }
    
        protected function AddFieldColumns(Grid $grid)
        {
            //
            // View column for Policy_No field
            //
            $column = new TextViewColumn('Policy_No', 'Policy No', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Item_Type_Name field
            //
            $column = new TextViewColumn('Item_Type_ID_Item_Type_Name', 'Item Type ID', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for Item_Type_ID field
            //
            $editor = new ComboBox('item_type_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`item_type`');
            $field = new IntegerField('Item_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Item_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('Item_Type_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Item Type ID', 
                'Item_Type_ID', 
                $editor, 
                $this->dataset, 'Item_Type_ID', 'Item_Type_Name', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for Item_Type_ID field
            //
            $editor = new ComboBox('item_type_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`item_type`');
            $field = new IntegerField('Item_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Item_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('Item_Type_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Item Type ID', 
                'Item_Type_ID', 
                $editor, 
                $this->dataset, 'Item_Type_ID', 'Item_Type_Name', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for User_Type_Name field
            //
            $column = new TextViewColumn('User_Type_ID_User_Type_Name', 'User Type ID', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for User_Type_ID field
            //
            $editor = new ComboBox('user_type_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`user_type`');
            $field = new IntegerField('User_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('User_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('User_Type_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'User Type ID', 
                'User_Type_ID', 
                $editor, 
                $this->dataset, 'User_Type_ID', 'User_Type_Name', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for User_Type_ID field
            //
            $editor = new ComboBox('user_type_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`user_type`');
            $field = new IntegerField('User_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('User_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('User_Type_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'User Type ID', 
                'User_Type_ID', 
                $editor, 
                $this->dataset, 'User_Type_ID', 'User_Type_Name', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for PR/Lending field
            //
            $column = new TextViewColumn('State_ID_PR/Lending', 'State ID', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for State_ID field
            //
            $editor = new ComboBox('state_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`state`');
            $field = new IntegerField('State_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('PR/Lending');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('PR/Lending', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'State ID', 
                'State_ID', 
                $editor, 
                $this->dataset, 'State_ID', 'PR/Lending', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for State_ID field
            //
            $editor = new ComboBox('state_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`state`');
            $field = new IntegerField('State_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('PR/Lending');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('PR/Lending', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'State ID', 
                'State_ID', 
                $editor, 
                $this->dataset, 'State_ID', 'PR/Lending', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Fine_Per_Day field
            //
            $column = new TextViewColumn('Fine_Per_Day', 'Fine Per Day', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for Fine_Per_Day field
            //
            $editor = new TextEdit('fine_per_day_edit');
            $editColumn = new CustomEditColumn('Fine Per Day', 'Fine_Per_Day', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for Fine_Per_Day field
            //
            $editor = new TextEdit('fine_per_day_edit');
            $editColumn = new CustomEditColumn('Fine Per Day', 'Fine_Per_Day', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column = new CurrencyFormatValueViewColumnDecorator($column, 2, ',', '.', $this->RenderText('Rs.'));
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Duration field
            //
            $column = new TextViewColumn('Duration', 'Duration', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for Duration field
            //
            $editor = new TextEdit('duration_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Duration', 'Duration', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for Duration field
            //
            $editor = new TextEdit('duration_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Duration', 'Duration', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Fine_Per_Day_After_Duration field
            //
            $column = new TextViewColumn('Fine_Per_Day_After_Duration', 'Fine Per Day After Duration', $this->dataset);
            $column->SetOrderable(true);
            
            /* <inline edit column> */
            //
            // Edit column for Fine_Per_Day_After_Duration field
            //
            $editor = new TextEdit('fine_per_day_after_duration_edit');
            $editColumn = new CustomEditColumn('Fine Per Day After Duration', 'Fine_Per_Day_After_Duration', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetEditOperationColumn($editColumn);
            /* </inline edit column> */
            
            /* <inline insert column> */
            //
            // Edit column for Fine_Per_Day_After_Duration field
            //
            $editor = new TextEdit('fine_per_day_after_duration_edit');
            $editColumn = new CustomEditColumn('Fine Per Day After Duration', 'Fine_Per_Day_After_Duration', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $column->SetInsertOperationColumn($editColumn);
            /* </inline insert column> */
            $column = new CurrencyFormatValueViewColumnDecorator($column, 2, ',', '.', $this->RenderText('Rs.'));
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Policy_No field
            //
            $column = new TextViewColumn('Policy_No', 'Policy No', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Item_Type_Name field
            //
            $column = new TextViewColumn('Item_Type_ID_Item_Type_Name', 'Item Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for User_Type_Name field
            //
            $column = new TextViewColumn('User_Type_ID_User_Type_Name', 'User Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for PR/Lending field
            //
            $column = new TextViewColumn('State_ID_PR/Lending', 'State ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Fine_Per_Day field
            //
            $column = new TextViewColumn('Fine_Per_Day', 'Fine Per Day', $this->dataset);
            $column->SetOrderable(true);
            $column = new CurrencyFormatValueViewColumnDecorator($column, 2, ',', '.', $this->RenderText('Rs.'));
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Duration field
            //
            $column = new TextViewColumn('Duration', 'Duration', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Fine_Per_Day_After_Duration field
            //
            $column = new TextViewColumn('Fine_Per_Day_After_Duration', 'Fine Per Day After Duration', $this->dataset);
            $column->SetOrderable(true);
            $column = new CurrencyFormatValueViewColumnDecorator($column, 2, ',', '.', $this->RenderText('Rs.'));
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for Item_Type_ID field
            //
            $editor = new ComboBox('item_type_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`item_type`');
            $field = new IntegerField('Item_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Item_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('Item_Type_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Item Type ID', 
                'Item_Type_ID', 
                $editor, 
                $this->dataset, 'Item_Type_ID', 'Item_Type_Name', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for User_Type_ID field
            //
            $editor = new ComboBox('user_type_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`user_type`');
            $field = new IntegerField('User_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('User_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('User_Type_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'User Type ID', 
                'User_Type_ID', 
                $editor, 
                $this->dataset, 'User_Type_ID', 'User_Type_Name', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for State_ID field
            //
            $editor = new ComboBox('state_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`state`');
            $field = new IntegerField('State_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('PR/Lending');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('PR/Lending', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'State ID', 
                'State_ID', 
                $editor, 
                $this->dataset, 'State_ID', 'PR/Lending', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Fine_Per_Day field
            //
            $editor = new TextEdit('fine_per_day_edit');
            $editColumn = new CustomEditColumn('Fine Per Day', 'Fine_Per_Day', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Duration field
            //
            $editor = new TextEdit('duration_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Duration', 'Duration', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Fine_Per_Day_After_Duration field
            //
            $editor = new TextEdit('fine_per_day_after_duration_edit');
            $editColumn = new CustomEditColumn('Fine Per Day After Duration', 'Fine_Per_Day_After_Duration', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for Item_Type_ID field
            //
            $editor = new ComboBox('item_type_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`item_type`');
            $field = new IntegerField('Item_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Item_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('Item_Type_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Item Type ID', 
                'Item_Type_ID', 
                $editor, 
                $this->dataset, 'Item_Type_ID', 'Item_Type_Name', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for User_Type_ID field
            //
            $editor = new ComboBox('user_type_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`user_type`');
            $field = new IntegerField('User_Type_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('User_Type_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('User_Type_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'User Type ID', 
                'User_Type_ID', 
                $editor, 
                $this->dataset, 'User_Type_ID', 'User_Type_Name', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for State_ID field
            //
            $editor = new ComboBox('state_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MyConnectionFactory(),
                GetConnectionOptions(),
                '`state`');
            $field = new IntegerField('State_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('PR/Lending');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->SetOrderBy('PR/Lending', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'State ID', 
                'State_ID', 
                $editor, 
                $this->dataset, 'State_ID', 'PR/Lending', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Fine_Per_Day field
            //
            $editor = new TextEdit('fine_per_day_edit');
            $editColumn = new CustomEditColumn('Fine Per Day', 'Fine_Per_Day', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Duration field
            //
            $editor = new TextEdit('duration_edit');
            $editor->SetSize(50);
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Duration', 'Duration', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Fine_Per_Day_After_Duration field
            //
            $editor = new TextEdit('fine_per_day_after_duration_edit');
            $editColumn = new CustomEditColumn('Fine Per Day After Duration', 'Fine_Per_Day_After_Duration', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $grid->SetShowAddButton(true);
                $grid->SetShowInlineAddButton(false);
            }
            else
            {
                $grid->SetShowInlineAddButton(false);
                $grid->SetShowAddButton(false);
            }
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for Policy_No field
            //
            $column = new TextViewColumn('Policy_No', 'Policy No', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Item_Type_Name field
            //
            $column = new TextViewColumn('Item_Type_ID_Item_Type_Name', 'Item Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for User_Type_Name field
            //
            $column = new TextViewColumn('User_Type_ID_User_Type_Name', 'User Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for PR/Lending field
            //
            $column = new TextViewColumn('State_ID_PR/Lending', 'State ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Fine_Per_Day field
            //
            $column = new TextViewColumn('Fine_Per_Day', 'Fine Per Day', $this->dataset);
            $column->SetOrderable(true);
            $column = new CurrencyFormatValueViewColumnDecorator($column, 2, ',', '.', $this->RenderText('Rs.'));
            $grid->AddPrintColumn($column);
            
            //
            // View column for Duration field
            //
            $column = new TextViewColumn('Duration', 'Duration', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Fine_Per_Day_After_Duration field
            //
            $column = new TextViewColumn('Fine_Per_Day_After_Duration', 'Fine Per Day After Duration', $this->dataset);
            $column->SetOrderable(true);
            $column = new CurrencyFormatValueViewColumnDecorator($column, 2, ',', '.', $this->RenderText('Rs.'));
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for Policy_No field
            //
            $column = new TextViewColumn('Policy_No', 'Policy No', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Item_Type_Name field
            //
            $column = new TextViewColumn('Item_Type_ID_Item_Type_Name', 'Item Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for User_Type_Name field
            //
            $column = new TextViewColumn('User_Type_ID_User_Type_Name', 'User Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for PR/Lending field
            //
            $column = new TextViewColumn('State_ID_PR/Lending', 'State ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Fine_Per_Day field
            //
            $column = new TextViewColumn('Fine_Per_Day', 'Fine Per Day', $this->dataset);
            $column->SetOrderable(true);
            $column = new CurrencyFormatValueViewColumnDecorator($column, 2, ',', '.', $this->RenderText('Rs.'));
            $grid->AddExportColumn($column);
            
            //
            // View column for Duration field
            //
            $column = new TextViewColumn('Duration', 'Duration', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Fine_Per_Day_After_Duration field
            //
            $column = new TextViewColumn('Fine_Per_Day_After_Duration', 'Fine Per Day After Duration', $this->dataset);
            $column->SetOrderable(true);
            $column = new CurrencyFormatValueViewColumnDecorator($column, 2, ',', '.', $this->RenderText('Rs.'));
            $grid->AddExportColumn($column);
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetShowSetToNullCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        public function ShowEditButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasEditGrant($this->GetDataset());
        }
        public function ShowDeleteButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasDeleteGrant($this->GetDataset());
        }
        
        public function GetModalGridDeleteHandler() { return 'policy_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'policyGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(false);
            $result->SetUseFixedHeader(false);
            
            $result->SetShowLineNumbers(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->CreateGridSearchControl($result);
            $this->CreateGridAdvancedSearchControl($result);
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
    
            $this->SetShowPageList(true);
            $this->SetHidePageListByDefault(false);
            $this->SetExportToExcelAvailable(false);
            $this->SetExportToWordAvailable(false);
            $this->SetExportToXmlAvailable(false);
            $this->SetExportToCsvAvailable(false);
            $this->SetExportToPdfAvailable(false);
            $this->SetPrinterFriendlyAvailable(false);
            $this->SetSimpleSearchAvailable(true);
            $this->SetAdvancedSearchAvailable(false);
            $this->SetFilterRowAvailable(false);
            $this->SetVisualEffectsEnabled(false);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
    
            //
            // Http Handlers
            //
    
            return $result;
        }
        
        public function OpenAdvancedSearchByDefault()
        {
            return false;
        }
    
        protected function DoGetGridHeader()
        {
            return '';
        }
    }



    try
    {
        $Page = new policyPage("policy.php", "policy", GetCurrentUserGrantForDataSource("policy"), 'UTF-8');
        $Page->SetShortCaption('Policy');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetCaption('Policy');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("policy"));
        GetApplication()->SetEnableLessRunTimeCompile(GetEnableLessFilesRunTimeCompilation());
        GetApplication()->SetCanUserChangeOwnPassword(
            !function_exists('CanUserChangeOwnPassword') || CanUserChangeOwnPassword());
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e->getMessage());
    }
	
