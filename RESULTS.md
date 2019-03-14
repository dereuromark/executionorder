# Executionorder - Results

## Basic action + component + helper + cell
```
config/paths
config/bootstrap
config/routes
Controller::initialize
FooComponent::beforeFilter
Controller::beforeFilter
FooComponent::startup
Controller.action
FooComponent::beforeRender
Controller::beforeRender

AppView::initialize
FooHelper::beforeRender
FooHelper::beforeRenderFile

InboxCell.action
AppView::initialize
FooHelper::beforeRender
FooHelper::beforeRenderFile
FooHelper::afterRenderFile
FooHelper::afterRender
FooHelper::beforeRenderFile
FooHelper::afterRenderFile

FooHelper::afterRenderFile
FooHelper::afterRender
FooHelper::beforeLayout
FooHelper::beforeRenderFile
FooHelper::afterRenderFile
FooHelper::afterLayout

FooComponent::shutdown
Controller::afterFilter
```
Note that component callbacks are usually called first.

## Model validate + save
```
config/paths
config/bootstrap
config/routes
Controller::initialize
FooComponent::beforeFilter
Controller::beforeFilter
FooComponent::startup
Controller.action

TokensTable:initialize
AlphaBehavior:initialize
AlphaBehavior:beforeMarshal
TokensTable:beforeMarshal

TokensTable:validationDefault
AlphaBehavior:buildValidator
TokensTable:buildValidator
TokensTable:buildRules
AlphaBehavior:buildRules

AlphaBehavior:beforeRules
TokensTable:beforeRules
AlphaBehavior:afterRules
TokensTable:afterRules
AlphaBehavior:beforeSave
TokensTable:beforeSave
AlphaBehavior:afterSave
TokensTable:afterSave

FooComponent::beforeRender
Controller::beforeRender
AppView::initialize
FooComponent::shutdown
Controller::afterFilter
```
Note that behavior callbacks are usually called first.
Exceptions are `initialize` and `buildRules` since those are not event listeners.

## Model save multiple times
```
...
TokensTable:initialize
AlphaBehavior:initialize
AlphaBehavior:beforeMarshal
TokensTable:beforeMarshal

TokensTable:validationDefault
AlphaBehavior:buildValidator
TokensTable:buildValidator
TokensTable:buildRules
AlphaBehavior:buildRules

AlphaBehavior:beforeRules
TokensTable:beforeRules
AlphaBehavior:afterRules
TokensTable:afterRules
AlphaBehavior:beforeSave
TokensTable:beforeSave
AlphaBehavior:afterSave
TokensTable:afterSave

AlphaBehavior:beforeMarshal
TokensTable:beforeMarshal

AlphaBehavior:beforeRules
TokensTable:beforeRules
AlphaBehavior:afterRules
TokensTable:afterRules
AlphaBehavior:beforeSave
TokensTable:beforeSave
AlphaBehavior:afterSave
TokensTable:afterSave
...
```
This shows that `initialize`, `validationDefault`, `buildValidator` and `buildRules` are only executed once, and then cached.
They should not be used for data modification. Instead use `beforeMarshal` if it should always be run - or if it
only applies to saving, `beforeRules`.

## Model save without validation
```
...
TokensTable:initialize
AlphaBehavior:initialize
AlphaBehavior:beforeMarshal
TokensTable:beforeMarshal
TokensTable:buildRules
AlphaBehavior:buildRules
AlphaBehavior:beforeRules
TokensTable:beforeRules
AlphaBehavior:afterRules
TokensTable:afterRules
AlphaBehavior:beforeSave
TokensTable:beforeSave
AlphaBehavior:afterSave
TokensTable:afterSave
...
```
This shows that `validationDefault` and `buildValidator` are not executed in this case. Only the callbacks around the domain rules are.

## Model save without validation and without rules
```
...
TokensTable:initialize
AlphaBehavior:initialize
AlphaBehavior:beforeSave
TokensTable:beforeSave
AlphaBehavior:afterSave
TokensTable:afterSave
...
```
In this case not even `buildRules` and the `beforeRules`/`afterRules` callbacks are triggered.

## Redirecting
```
config/paths
config/bootstrap
config/routes
Controller::initialize
FooComponent::beforeFilter
Controller::beforeFilter
FooComponent::startup
Controller.action

Controller::redirect
FooComponent::beforeRedirect

FooComponent::shutdown
Controller::afterFilter
```

## Exception in controller action
```
config/paths
config/bootstrap
config/routes
Controller::initialize
FooComponent::beforeFilter
Controller::beforeFilter
FooComponent::startup

AppView::initialize
```
It jumps directly to the View, no `shutdown` or `afterFilter` callbacks fired anymore.

## Basic shell command
```
config/paths
config/bootstrap (default + cli one)
Shell::__construct
Shell::initialize
Shell::startup
Shell::command
```

## Basic shell command with error() call
```
config/paths
config/bootstrap (default + cli one)
Shell::__construct (to disable logging)
Shell::initialize
Shell::startup
Shell::command
Shell::abort
```
Note that `abort()` can't be used as "shutdown" method, as it is only invoked in error case, not on normal shutdown.
