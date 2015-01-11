# Executionorder - Results

## Basic action + helper
```
Info: config/paths
Info: config/bootstrap
Info: config/routes
Info: Controller::initialize
Info: FooComponent::beforeFilter
Info: Controller::beforeFilter
Info: FooComponent::startup
Info: Controller.action
Info: FooComponent::beforeRender
Info: Controller::beforeRender

Info: AppView::initialize
Info: FooHelper::beforeRender
Info: FooHelper::beforeRenderFile
Info: FooHelper::afterRenderFile
Info: FooHelper::afterRender
Info: FooHelper::beforeLayout
Info: FooHelper::beforeRenderFile
Info: FooHelper::afterRenderFile
Info: FooHelper::afterLayout

Info: FooComponent::shutdown
Info: Controller::afterFilter
```
Note that component callbacks are usually called first.

## Model validate + save
```
Info: config/paths
Info: config/bootstrap
Info: config/routes
Info: Controller::initialize
Info: FooComponent::beforeFilter
Info: Controller::beforeFilter
Info: FooComponent::startup
Info: Controller.action

Info: TokensTable:initialize
Info: AlphaBehavior:initialize
Info: TokensTable:validationDefault
Info: AlphaBehavior:buildValidator
Info: TokensTable:buildRules
Info: AlphaBehavior:buildRules
Info: AlphaBehavior:beforeRules
Info: TokensTable:beforeRules
Info: AlphaBehavior:afterRules
Info: TokensTable:afterRules
Info: AlphaBehavior:beforeSave
Info: TokensTable:beforeSave
Info: AlphaBehavior:afterSave
Info: TokensTable:afterSave

Info: FooComponent::beforeRender
Info: Controller::beforeRender
Info: AppView::initialize
Info: FooComponent::shutdown
Info: Controller::afterFilter
```
Note that behavior callbacks are usually called first.
Exceptions are `initialize` and `buildRules` since those are not event listeners.

## Model save multiple times
```
...
Info: TokensTable:initialize
Info: AlphaBehavior:initialize
Info: TokensTable:validationDefault
Info: AlphaBehavior:buildValidator
Info: TokensTable:buildRules
Info: AlphaBehavior:buildRules

Info: AlphaBehavior:beforeRules
Info: TokensTable:beforeRules
Info: AlphaBehavior:afterRules
Info: TokensTable:afterRules
Info: AlphaBehavior:beforeSave
Info: TokensTable:beforeSave
Info: AlphaBehavior:afterSave
Info: TokensTable:afterSave

Info: AlphaBehavior:beforeRules
Info: TokensTable:beforeRules
Info: AlphaBehavior:afterRules
Info: TokensTable:afterRules
Info: AlphaBehavior:beforeSave
Info: TokensTable:beforeSave
Info: AlphaBehavior:afterSave
Info: TokensTable:afterSave
...
```
This shows that `initialize`, `validationDefault`, `buildValidator` and `buildRules` are only executed once, and then cached.
They should not be used for data modification.

## Model save without validation
```
...
Info: TokensTable:initialize
Info: AlphaBehavior:initialize
Info: TokensTable:buildRules
Info: AlphaBehavior:buildRules
Info: AlphaBehavior:beforeRules
Info: TokensTable:beforeRules
Info: AlphaBehavior:afterRules
Info: TokensTable:afterRules
Info: AlphaBehavior:beforeSave
Info: TokensTable:beforeSave
Info: AlphaBehavior:afterSave
Info: TokensTable:afterSave
...
```
This shows that `validationDefault` and `buildValidator` are not executed in this case. Only the callbacks around the domain rules are.

## Model save without validation and without rules
```
...
Info: TokensTable:initialize
Info: AlphaBehavior:initialize
Info: AlphaBehavior:beforeSave
Info: TokensTable:beforeSave
Info: AlphaBehavior:afterSave
Info: TokensTable:afterSave
...
```
In this case not even `buildRules` and the `beforeRules`/`afterRules` callbacks are triggered.

## Redirecting
```
Info: config/paths
Info: config/bootstrap
Info: config/routes
Info: Controller::initialize
Info: FooComponent::beforeFilter
Info: Controller::beforeFilter
Info: FooComponent::startup
Info: Controller.action

Info: Controller::redirect
Info: FooComponent::beforeRedirect

Info: FooComponent::shutdown
Info: Controller::afterFilter
```
