# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) 
and this project adheres to [Semantic Versioning](http://semver.org/).

## [1.0.2] - 2018-05-25
- Fixed some phpdoc issues

## [1.0.1] - 2018-03-28
- Added Lumen 5.5 compatibility

## [1.0.0] - 2017-02-08
### Added
- CHANGELOG.md.
- `config/rbac.php` configuration skeleton.

### Changed
- Update lumen framework version to 5.4.
- Update PHP version to 5.6.
- Update README.md.
- Move configuring of Rbac to ServiceProvider.

### Removed
- Unnecessary abstract RbacCommand console command.
- `minimum-stability: dev` from composer.json.

## [0.7.0] - 2015-12-22
### Added
- subjectHasPermission function.

## [0.6.0] - 2015-11-05
### Added
- getRolesForSubject function.
- getAssignment function.

### Changed
- Update Overseer to 0.4.

## [0.5.1] - 2015-11-03
### Fixed
- Not null check before deleting assignment.

## [0.5.0] - 2015-09-11
### Added
- Function deleteAssignment.

### Changed
- Update Overseer to 0.3
- Rename saveAssignment to createAssignment.

## [0.4.3] - 2015-07-22
### Changed
- Update PHP version in README.md
- Add setter for subjectProvider.
- Update composer.lock.

## [0.4.2] - 2015-07-16
### Changed
- Update composer.json.
- Update framework version.

## [0.4.1] - 2015-07-16
### Changed
- Update composer.lock.

### Fixed
- Revert Overseer version.

## [0.4.0] - 2015-07-15
### Added
- Methods for saving roles, assignments and permissions.

### Changed
- Update Overseer version.

## [0.3.0] - 2015-06-23
### Changed
- Update Overseer version.

## [0.2.0] - 2015-06-19
### Added
- Overseer requirement through composer.

## [0.1.0] - 2015-06-19
### Added
- Project files

### Changed
- Update README.md

[Unreleased] - YYYY-MM-DD
### Added
- For new features.
### Changed
- For changes in existing functionality.
### Deprecated
- For once-stable features removed in upcoming releases.
### Removed
- For deprecated features removed in this release.
### Fixed
- For any bug fixes.
### Security
- To invite users to upgrade in case of vulnerabilities.

[Unreleased]: https://github.com/nordsoftware/lumen-rbac/compare/1.0.0...HEAD
[1.0.0]: https://github.com/nordsoftware/lumen-rbac/compare/0.7.0...1.0.0
[0.7.0]: https://github.com/nordsoftware/lumen-rbac/compare/0.6.0...0.7.0
[0.6.0]: https://github.com/nordsoftware/lumen-rbac/compare/0.5.1...0.6.0
[0.5.1]: https://github.com/nordsoftware/lumen-rbac/compare/0.5.0...0.5.1
[0.5.0]: https://github.com/nordsoftware/lumen-rbac/compare/0.4.3...0.5.0
[0.4.3]: https://github.com/nordsoftware/lumen-rbac/compare/0.4.2...0.4.3
[0.4.2]: https://github.com/nordsoftware/lumen-rbac/compare/0.4.1...0.4.2
[0.4.1]: https://github.com/nordsoftware/lumen-rbac/compare/0.4.0...0.4.1
[0.4.0]: https://github.com/nordsoftware/lumen-rbac/compare/0.3.0...0.4.0
[0.3.0]: https://github.com/nordsoftware/lumen-rbac/compare/0.2.0...0.3.0
[0.2.0]: https://github.com/nordsoftware/lumen-rbac/compare/0.1.0...0.2.0
[0.1.0]: https://github.com/nordsoftware/lumen-rbac/tree/0.1.0
