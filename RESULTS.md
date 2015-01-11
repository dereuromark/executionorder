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

## Model validte + save
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
Info: FooComponent::beforeRedirect
Info: FooComponent::shutdown
Info: Controller::afterFilter
```
