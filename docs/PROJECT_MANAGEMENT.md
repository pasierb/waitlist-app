# Project Management

## Lifecycle

### Project create

### Project publish

*Projects per se are not being published, ProjectVersions are*

When version is being published:

- all other project versions are marked as unpublished
- version is marked as published
- project's `published_version_id` is set to `version.id`
- new draft version is created
