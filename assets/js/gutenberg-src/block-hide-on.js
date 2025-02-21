// Declare
const bfCheckNamespace = ( name ) => {
  const namespace = [ { name: 'core/' }, { name: 'beflex/' } ];
  for ( let i = 0; namespace.length > i; i++) {
    if ( name.startsWith( namespace[i].name ) ) {
      return true;
    }
  }
  return false;
}

const bfHideOnAttributes = ( settings, name ) => {
  if ( ! bfCheckNamespace(name) ) {
    return settings;
  }
  return Object.assign( {}, settings, {
    attributes: Object.assign( {}, settings.attributes, {
      hideOnMobile: { type: 'boolean' },
      hideOnDesktop: { type: 'boolean' },
    } ),
  } );
};

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'beflex/hide-on-attributes',
  bfHideOnAttributes
);


const { createHigherOrderComponent } = wp.compose;

const bfHideOnControls = createHigherOrderComponent( ( BlockEdit ) => {
  return ( props ) => {
    const { Fragment, useState } = wp.element;
    const { ToggleControl, RadioControl, TextControl } = wp.components;
    const { InspectorAdvancedControls } = wp.blockEditor;
    const { attributes, setAttributes, isSelected } = props;
    const { hideOnMobile, hideOnDesktop } = attributes;

    if ( ! bfCheckNamespace(props.name) ) {
      return (
        <BlockEdit { ...props } />
      );
    }

    return (
      <Fragment>
        <BlockEdit {...props} />
        {isSelected &&
            <InspectorAdvancedControls>
              <div className="full-width-control-wrapper">
                <strong style={{display: "block", marginBottom: "6px"}}>{wp.i18n.__("Hide on", 'beflex')}</strong>
                <ToggleControl
                    label={wp.i18n.__('Hide on mobile', 'beflex')}
                    checked={hideOnMobile === true}
                    onChange={(value) => setAttributes({hideOnMobile: value})}
                    className="full-width-control-wrapper"
                />
                <ToggleControl
                    label={wp.i18n.__('Hide on desktop', 'beflex')}
                    checked={hideOnDesktop === true}
                    onChange={(value) => setAttributes({hideOnDesktop: value})}
                    className="full-width-control-wrapper"
                />
              </div>
            </InspectorAdvancedControls>
        }
      </Fragment>
    );
  };
}, 'bfHideOnControls');

wp.hooks.addFilter(
    'editor.BlockEdit',
    'beflex/hide-on-controls',
    bfHideOnControls
);

const bfHideOnProp = createHigherOrderComponent((BlockListBlock) => {
  return (props) => {
    console.log(props);
    if (!bfCheckNamespace(props.name)) {
      return (
          <BlockListBlock {...props} />
      );
    }

    return (
        <BlockListBlock
            {...props}
            className={'hide-on-mobile'}
        />
    );
  };
}, 'bfHideOnProp');

// wp.hooks.addFilter(
//     'editor.BlockListBlock',
//     'beflex/hide-on-prop',
//     bfHideOnProp
// );


import classnames from 'classnames';

const bfHideOnDisplay = (extraProps, blockType, attributes) => {
  const {hideOnMobile, hideOnDesktop} = attributes;
  const { className } = extraProps;

  if (!bfCheckNamespace(blockType.name)) {
    return extraProps;
  }

  return Object.assign({}, extraProps, {
    className: classnames(className, {
      'hide-on-mobile' : hideOnMobile,
      'hide-on-desktop' : hideOnDesktop,
    })
  })

  // if (hideOnMobile) {
  //   extraProps.className = classnames(extraProps.className, 'hide-on-mobile');
  // }

};

wp.hooks.addFilter(
    'blocks.getSaveContent.extraProps',
    'beflex/hide-on-display',
    bfHideOnDisplay
);
