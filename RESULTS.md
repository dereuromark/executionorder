# Executionorder - Results

## Basic action + component + helper + cell
```
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
FooHelper::beforeRender (templates/Tokens/index.php)
FooHelper::beforeRenderFile (templates/Tokens/index.php)

InboxCell.action
AppView::initialize
FooHelper::beforeRender (templates/cell/Inbox/display.php)
FooHelper::beforeRenderFile (templates/cell/Inbox/display.php)
FooHelper::afterRenderFile (templates/cell/Inbox/display.php)
FooHelper::afterRender (templates/cell/Inbox/display.php)

FooHelper::beforeRenderFile (templates/element/info.php)
FooHelper::afterRenderFile (templates/element/info.php)
FooHelper::afterRenderFile (templates/Tokens/index.php)
FooHelper::afterRender (templates/Tokens/index.php)

FooHelper::beforeLayout (templates/layout/default.php)
FooHelper::beforeRenderFile (templates/layout/default.php)
FooHelper::afterRenderFile (templates/layout/default.php)
FooHelper::afterLayout (templates/layout/default.php)

FooComponent::shutdown
Controller::afterFilter
```
Note that component callbacks are usually called first.

## Model marshal (patch/validate) only
```
config/bootstrap
config/routes
Controller::initialize
FooComponent::beforeFilter
Controller::beforeFilter
FooComponent::startup
Controller.action

TokensTable::initialize
AlphaBehavior::initialize
AlphaBehavior::beforeMarshal
TokensTable::beforeMarshal
TokensTable::validationDefault
AlphaBehavior::buildValidator
TokensTable::buildValidator
AlphaBehavior::afterMarshal
TokensTable::afterMarshal

FooComponent::beforeRender
Controller::beforeRender
FooComponent::shutdown
Controller::afterFilter
```


## Model validate + save
```
config/bootstrap
config/routes
Controller::initialize
FooComponent::beforeFilter
Controller::beforeFilter
FooComponent::startup
Controller.action

TokensTable::initialize
AlphaBehavior::initialize
AlphaBehavior::beforeMarshal
TokensTable::beforeMarshal

TokensTable::validationDefault
AlphaBehavior::buildValidator
TokensTable::buildValidator
AlphaBehavior:afterMarshal
TokensTable:afterMarshal

TokensTable::buildRules
AlphaBehavior::buildRules

AlphaBehavior::beforeRules
TokensTable::beforeRules
AlphaBehavior::afterRules
TokensTable::afterRules
AlphaBehavior::beforeSave
TokensTable::beforeSave
AlphaBehavior::afterSave
TokensTable::afterSave
AlphaBehavior:afterSaveCommit
TokensTable:afterSaveCommit

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
TokensTable::initialize
AlphaBehavior::initialize
AlphaBehavior::beforeMarshal
TokensTable::beforeMarshal

TokensTable::validationDefault
AlphaBehavior::buildValidator
TokensTable::buildValidator
AlphaBehavior::afterMarshal
TokensTable::afterMarshal

TokensTable::buildRules
AlphaBehavior::buildRules

AlphaBehavior::beforeRules
TokensTable::beforeRules
AlphaBehavior::afterRules
TokensTable::afterRules
AlphaBehavior::beforeSave
TokensTable::beforeSave
AlphaBehavior::afterSave
TokensTable::afterSave
AlphaBehavior:afterSaveCommit
TokensTable:afterSaveCommit

AlphaBehavior::beforeMarshal
TokensTable::beforeMarshal
AlphaBehavior::afterMarshal
TokensTable::afterMarshal

AlphaBehavior::beforeRules
TokensTable::beforeRules
AlphaBehavior::afterRules
TokensTable::afterRules
AlphaBehavior::beforeSave
TokensTable::beforeSave
AlphaBehavior::afterSave
TokensTable::afterSave
AlphaBehavior:afterSaveCommit
TokensTable:afterSaveCommit
...
```
This shows that `initialize`, `validationDefault`, `buildValidator` and `buildRules` are only executed once, and then cached.
They should not be used for data modification. Instead use `beforeMarshal`/`afterMarshal` if it should always be run on patching level.
Use `beforeRules` if it only applies to saving.

## Model save without validation
```
...
TokensTable::initialize
AlphaBehavior::initialize
AlphaBehavior::beforeMarshal
TokensTable::beforeMarshal
AlphaBehavior::afterMarshal
TokensTable::afterMarshal
TokensTable::buildRules
AlphaBehavior::buildRules
AlphaBehavior::beforeRules
TokensTable::beforeRules
AlphaBehavior::afterRules
TokensTable::afterRules
AlphaBehavior::beforeSave
TokensTable::beforeSave
AlphaBehavior::afterSave
TokensTable::afterSave
AlphaBehavior:afterSaveCommit
TokensTable:afterSaveCommit
...
```
This shows that `validationDefault` and `buildValidator` are not executed in this case. Only the callbacks around the domain rules are.

## Model save without validation and without rules
```
...
TokensTable::initialize
AlphaBehavior::initialize
AlphaBehavior::beforeMarshal
TokensTable::beforeMarshal
AlphaBehavior::afterMarshal
TokensTable::afterMarshal
AlphaBehavior::beforeSave
TokensTable::beforeSave
AlphaBehavior::afterSave
TokensTable::afterSave
AlphaBehavior:afterSaveCommit
TokensTable:afterSaveCommit
...
```
In this case not even `buildRules` and the `beforeRules`/`afterRules` callbacks are triggered.
But `beforeMarshal` and `afterMarshal` always, so be careful not to overuse them for validation, as you cannot circumvent them then.

## Model delete
```
...
AlphaBehavior:beforeDelete
TokensTable:beforeDelete
AlphaBehavior:afterDelete
TokensTable:afterDelete
AlphaBehavior:afterDeleteCommit
TokensTable:afterDeleteCommit
...
```

## Redirecting
```
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
config/bootstrap
config/routes
Controller::initialize
FooComponent::beforeFilter
Controller::beforeFilter
FooComponent::startup

AppView::initialize
```
It jumps directly to the View, no `shutdown` or `afterFilter` callbacks fired anymore.

## Basic command
```
config/bootstrap (default + cli one)
Command::__construct
Command::initialize
Command::startup
Command::execute
```

## Basic shell command
```
config/bootstrap (default + cli one)
Shell::__construct
Shell::initialize
Shell::startup
Shell::command
```

## Basic shell command with error() call
```
config/bootstrap (default + cli one)
Shell::__construct (to disable logging)
Shell::initialize
Shell::startup
Shell::command
Shell::abort
```
Note that `abort()` can't be used as "shutdown" method, as it is only invoked in error case, not on normal shutdown.
