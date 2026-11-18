# Contact Form 7 — Rooted and Roaming

An opt-in, Flowbite-inspired component that uses the child theme's Sass pipeline. No Flowbite/Tailwind dependency is required. Both appearance variants are transparent, so the Kadence section background shows through.

## Copy into Contact → Contact Forms → Form

### Light (default) — light page or section

```html
<div class="rr_contact_form_wrapper">
  <div class="rr_contact_form_field">
    <label class="rr-form__label" for="rr-contact-name">Your name</label>
    [text* your-name id:rr-contact-name class:rr-field autocomplete:name placeholder "Your name"]
  </div>
  <div class="rr_contact_form_field">
    <label class="rr-form__label" for="rr-contact-email">Your email</label>
    [email* your-email id:rr-contact-email class:rr-field autocomplete:email placeholder "name@example.com"]
  </div>
  <div class="rr_contact_form_actions">[submit "Submit"]</div>
</div>
```

### Dark — dark section or image with a dark overlay

Change the opening tag only:

```html
<div class="rr_contact_form_wrapper rr-contact-form--dark">
```

You can also add `rr-contact-form--light` for clarity, but it is optional; light is the default. Do **not** apply both modifiers. Neither variant creates a solid container background. Use Kadence's section overlay for images, ensuring readable contrast behind labels and buttons.

### Default and large fields

Default: `class:rr-field` (14px / minimum height 42px).

Large: add `class:rr-field--lg` (16px / minimum height 52px), e.g.:

```text
[email* your-email id:rr-contact-email class:rr-field class:rr-field--lg autocomplete:email placeholder "name@example.com"]
```

Input size and appearance are independent. IDs must be unique on each page.


## Layout modifiers

Apply these classes **on the same `div`** as `.rr_contact_form_wrapper`. They are independent of the light/dark appearance and field-size classes.

| Layout | Wrapper | Behavior |
| --- | --- | --- |
| Stacked (default) | `rr_contact_form_wrapper` | Single column; centered max-width 24rem |
| Inline | `rr_contact_form_wrapper rr-contact-form--inline` | Three columns (name, email, submit) at 48rem and wider; stacked below 48rem |
| Full-width stacked | `rr_contact_form_wrapper rr-contact-form--full` | One column filling the available Kadence section width |

Examples:

```html
<div class="rr_contact_form_wrapper rr-contact-form--inline rr-contact-form--dark">
  <!-- Same field and submit markup as above -->
</div>
```

```html
<div class="rr_contact_form_wrapper rr-contact-form--full">
  <!-- Same field and submit markup as above -->
</div>
```

The `--inline` and `--full` classes are **alternative layouts**; do not combine them. Use one light/dark appearance modifier at most. Form input sizes (`rr-field--lg`) remain independent.

Check at 320px, 767px, 768px, desktop, and 200% zoom; ensure labels and error messages stay with their fields and the submit aligns beside the fields on desktop. The parent Kadence block determines available width.

## reCAPTCHA v3

Configure Google reCAPTCHA v3 keys through **Contact → Integration → reCAPTCHA**. No form tag is needed. Keep development and production keys separate and out of source control. Validate actual submissions; scoring-based filtering does not guarantee zero spam.

## Review before merge

- Run `npm ci && npm run build`, then `git diff -- assets/css/theme.css`.
- Test light form on light/white/parchment backgrounds and dark form on forest/dark/image-with-overlay sections.
- Test both field sizes, required fields, invalid email, focus, mobile at 320px, 200% zoom, reCAPTCHA, and email delivery.
- Confirm Mail tab uses `[your-name]` and `[your-email]`, with a site-domain sender and `Reply-To: [your-email]`.
- Submission storage remains a separate plugin concern.
