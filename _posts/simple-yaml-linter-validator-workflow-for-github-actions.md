---
title: 'Simple YAML Linter/Validator Workflow for GitHub Actions'
date: '2024-06-23 10:30'
description: 'Workflow to create a simple and fast YAML linter/validator in GitHub Actions'
author: emma
---

The GitHub Actions Ubuntu runners comes with [yamllint](https://github.com/adrienverge/yamllint) installed, meaning it's super simple to create linting/validating workflows to ensure your YAML is valid!


```yaml
# filepath: .github/workflows/lint.yml
name: Validate YAML

on:
  push:
  pull_request:

jobs:
  validate-yaml:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - name: Validate YAML file
        run: yamllint my-file.yml
```
