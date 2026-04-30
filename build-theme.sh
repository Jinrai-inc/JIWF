#!/usr/bin/env bash
# Build a WordPress-installable jiwf-academy.zip from this directory.
# Usage:  bash build-theme.sh
# Output: ./jiwf-academy.zip  (unzip → wp-content/themes/jiwf-academy/)

set -euo pipefail

OUT_DIR="$(mktemp -d)"
trap 'rm -rf "$OUT_DIR"' EXIT

# Use git archive when inside a git work tree (clean export, respects .gitignore),
# otherwise fall back to tar with explicit excludes.
if git rev-parse --is-inside-work-tree >/dev/null 2>&1; then
	git archive --format=tar HEAD | tar -x -C "$OUT_DIR"
else
	tar --exclude='./.git' --exclude='./.github' --exclude='./node_modules' \
	    --exclude='./build-theme.sh' --exclude='./jiwf-academy.zip' \
	    -cf - . | tar -x -C "$OUT_DIR"
fi

# Repack under a stable, WordPress-friendly folder name.
mv "$OUT_DIR/.github" "$OUT_DIR/.github.skip" 2>/dev/null || true
mkdir -p "$OUT_DIR/jiwf-academy"
shopt -s dotglob
for entry in "$OUT_DIR"/*; do
	name="$(basename "$entry")"
	case "$name" in
		jiwf-academy|.github.skip|build-theme.sh) continue ;;
	esac
	mv "$entry" "$OUT_DIR/jiwf-academy/"
done
shopt -u dotglob

rm -f jiwf-academy.zip
( cd "$OUT_DIR" && zip -rq "$OLDPWD/jiwf-academy.zip" jiwf-academy )

echo "Built jiwf-academy.zip ($(du -h jiwf-academy.zip | cut -f1))"
