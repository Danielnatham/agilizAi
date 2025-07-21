import { DetailedHTMLProps, ImgHTMLAttributes } from "react";

export default function AppLogoIcon(
    props: DetailedHTMLProps<ImgHTMLAttributes<HTMLImageElement>, HTMLImageElement>
) {
    return (
        <img {...props} src="/storage/cropped-LOGO-AC-270x270.jpg"/>
    );
}
