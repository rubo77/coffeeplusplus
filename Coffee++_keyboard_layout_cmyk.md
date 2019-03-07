create CMYK PDF from RGB
========================

The pdf is exported from the gif with 356 dpi scaled to 3600px width.

Then converted to CMYK, (whereby the green is a bit changing):

`gs -dSAFER -dBATCH -dNOPAUSE -dNOCACHE -sDEVICE=pdfwrite -sColorConversionStrategy=CMYK -dProcessColorModel=/DeviceCMYK -sOutputFile=Coffee++_keyboard_layout_cmyk.pdf Coffee++_keyboard_layout.pdf`
